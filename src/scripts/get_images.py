import selenium.webdriver as webdriver
import base64
import requests
from pathlib import Path
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from time import sleep, time
from PIL import Image
from io import BytesIO
from os import path

def get_options():
    options = webdriver.ChromeOptions()
    options.headless = False # type: ignore
    return options

def get_images(
        queries: list[str], 
        captcha_resolution_time: int, 
        alts: list[str] | list[list[str]],
        loading_time: int = 10,
        output: str = "assets/example/",
    ):
    options = get_options()
    driver = webdriver.Chrome(options=options)
    driver.maximize_window()
    dist = Path(output)

    if path.exists(dist):
        dist = Path(output + f"{int(time())}") # Avoid overwriting existing directory
    dist.mkdir(exist_ok=False)
    count = 1

    try:
        for querie_n, q in enumerate(queries):
            driver.get(f"https://www.google.com/search?q={q}&tbm=isch")

            if "sorry/index" in driver.current_url:
                sleep(captcha_resolution_time)  # Wait for the user resolve the CAPTCHA

            print(f"Current query: '{q}'")
            print("Loading page...")
            sleep(loading_time)

            tmp_alt = alts[ querie_n ]
            images = []

            if isinstance(tmp_alt, list):
                joined = []
                for alt in tmp_alt:
                    selector = f"img[alt*='{ alt }' i]"
                    images = driver.find_elements(By.CSS_SELECTOR, selector)
                    if images:
                        joined.extend(images)
                images = list(set(joined))
            elif isinstance(tmp_alt, str):
                selector = f"img[alt*='{ tmp_alt }' i]"
                images = driver.find_elements(By.CSS_SELECTOR, selector)

            print(f"Found {len(images)} images on the page.")

            for img in images:
                src = img.get_attribute("src")
                ext = None
                binary = None

                if not src:
                    print(f"Skipped image {count}")
                    count += 1
                    continue
                elif src.startswith("https://") or src.startswith("http://"):
                    print(f"Image {count} looks like a URL, downloading it...")
                    ext = 'jpg'
                    response = requests.get(src, stream=True)
                    image = Image.open(BytesIO( response.raw.read() ))
                    binary = image.tobytes()

                elif src.startswith("data:image/"):
                    data = src.split("base64,")[-1]
                    mime_type = src.split(";")[ 0 ].split(":")[ 1 ]
                    ext = mime_type.split("/")[-1]
                    binary = base64.b64decode( data )

                    if ext == 'gif':
                        print(f"Skipped image {count} with unsupported GIF format")
                        count += 1
                        continue
                else:
                    print(f"Skipped image {count} with unsupported src format")
                    count += 1
                    continue

                write_image(dist, binary, count, ext)
                print("Current count:", count)
                count += 1

            driver.back()
            count += 1

    finally:
        # Close the WebDriver
        driver.quit()

def write_image(
        path: Path,
        data: bytes, 
        index: int, 
        ext: str = "jpg"
        ) -> None:
    try:
        file = path / f"{index}.{ext}"

        with open(file, "wb") as f:
            f.write(data)
    except IOError as e:
        print("Skipped image due to an error:", e)


if __name__ == "__main__":
    CAPTCHA_RESOLUTION_TIME = 20
    QUERIES = [
        "Hermosas casas minimalistas y modernas (imagenes de pexels.com) solo casas",
        "Imágenes de Casas Unsplash con licencia gratuita",
        "Imágenes de casas Valencia, Venezuela"
    ]
    ALTS = [
        "Fotos y Imágenes de Casa",
        "Imágenes de Casas",
        [
            "casa",
            "venezuela",
            "Casas en venta",
            "Casa en venta", 
            "Valencia"
        ]
    ]

    get_images(
        queries=QUERIES, 
        captcha_resolution_time=CAPTCHA_RESOLUTION_TIME, 
        alts=ALTS,
        loading_time=10,
        output="assets/result/"
    )