import ollama
import json
import asyncio
from pprint import pprint
from googletrans import LANGUAGES
from googletrans import Translator
from os import listdir
from pathlib import Path
from time import sleep

def write_json(data, path):
    try:
        with open(path, 'w', encoding="utf-8") as f:
            json.dump(data, f, indent=4, ensure_ascii=False)
    except Exception as e:
        print(f"An error occurred while writing JSON: {e}")
        print("Operation skipped.")

async def describe_images(
    input_dir: Path = Path("assets/example/"),
    output_dir: Path = Path("assets/example/")
) -> None:
    prompt = """
    SIGUE LAS INSTRUCCIONES Y RESPONDE SIEMPRE EN ESPAÑOL:
    Tu eres un experto en describir imagenes inmobiliarias. 
    Analiza la imagen Y has una descripcion corta en español de la imagen.
    La descripcion debe ser atractiva y debe ser informativa (ej. "Lujosa casa blanca con piscina y bosque"). 
    La descripcion, titulo debe estar en español, pero la ubicacion debe ser en formato "Ciudad, Estado" y debe ser una ciudad y estado de Venezuela (ej. "Valencia, Carabobo").
    No pongas toda la info solo en la descripcion, ponlo en sus respectivas llaves (ej. "location", "price", etc).
    No añadas informacion de otros campos en la descripcion, solo describe la imagen.
    Responde ÚNICAMENTE un objeto JSON formateado que tenga estas llaves:
    - "title": Un título corto y atractivo para la casa en español.
    - "description": Una frase atractiva sobre la casa en español.
    - "location": Inventa una ubicación basada en el estilo (ej. "Valencia, Carabobo"). Debe ser el siguiente formato: "Ciudad, Estado". tiene que ser un estado y ciudad de Venezuela.
    - "price": Inventa un precio lógico en dólares basado en la apariencia (minimo 20000), tiene que ser un número entero (ej: 150000).
    - "bedrooms": Inventa un número lógico de habitaciones basado en la apariencia. SOLO TIENE QUE SER UN NUMERO ENTERO, NO PONGAS "3.5" O "3-4", SOLO UN NUMERO ENTERO.
    - "bathrooms": Inventa un número lógico de baños basado en la apariencia. TIENE QUE SER SOLO UN NUMERO ENTERO, NO PONGAS "2.5" O "2-3", SOLO UN NUMERO ENTERO.
    IMPORTANTE:
    - LA RESPUESTA DEBE COMENZAR CON "{" Y TERMINAR CON "}"
    - EL SISTEMA FALLARA SI ESCRIBES EN INGLES
    """

    translator = Translator()
    extensions = ['jpg', 'jpeg', 'png', 'bmp']
    files = []
    for file in listdir(input_dir):
        if file.lower().endswith( tuple(extensions) ):
            files.append(input_dir / file)
    print("Found files: ", " ".join([file.name for file in files]))
    print("Total files found: ", len(files))

    tasks_path = Path(input_dir / "tasks.json")

    if tasks_path.exists():
        with open(tasks_path, 'r', encoding="utf-8") as f:
            tasks = json.load(f)
    else:
        tasks = { "completed": [] } 
    for file in files:
        if file.name in tasks["completed"]:
            continue
        else:
            try:
                print("Current: ", file.name)
                print("Generating response...")

                response = ollama.generate(
                    model='llava',
                    prompt=prompt,
                    images=[ str( file ) ],
                    options={ 
                        "temperature": 0.2, 
                        "num_thread": 4,
                        "num_ctx": 1024,
                        "low_vram": True,
                    }
                )
                print("Original response:", response)
                print("Cleaning response...")
                res = response['response']
                start = res.find("{")
                stop = res.rfind("}") + 1
                if start != -1 and stop != -1:
                    res = res[start:stop]
                    res = res.strip()
                else:
                    # Clean markdown code blocks if JSON is not found
                    print("The LLM did not return a valid JSON response")
                    print("This image was skipped: ", file.name)
                    continue
                
                print("Output:", res)
                print("Parsing JSON response...")
                output = json.loads(res)
                translations = await translator.translate(
                    [output['title'], output['description']], dest=LANGUAGES['es']
                ) # Ensure language
                output['title'] = translations[ 0 ].text
                output['description'] = translations[ 1 ].text
                print("Translated: ", pprint(output))
                
                print("Writing JSON to file...")
                write_json(output, output_dir / f"{file.stem}_data.json")

                tasks["completed"].append(file.name)
                write_json(tasks, tasks_path)

                sleep(16)  # Sleep for 16 seconds to avoid rate limits, and let the OS clean resources
            except Exception as e:
                print(f"A error occurred: {e}")

if __name__ == "__main__":
    asyncio.run(
        describe_images(
            input_dir=Path("assets/result/"),
            output_dir=Path("assets/result/")
        )
    )