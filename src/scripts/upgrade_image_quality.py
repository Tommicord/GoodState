from super_image import EdsrModel, ImageLoader
from PIL import Image
from io import BytesIO
from pathlib import Path

model = EdsrModel.from_pretrained("eugenesiow/edsr-base", scale=4)

def upgrade_image_quality(
        input_file: Path, 
        output_file: Path, 
        input_dir: Path = Path("assets/example"), 
        output_dir: Path = Path("assets/example/upgraded")
    ) -> None:
    input_file = input_dir / input_file
    binary = Image.open( BytesIO( input_file.read_bytes() ) ).convert("RGB")
    loaded_img = ImageLoader.load_image(binary) # type: ignore
    output_img = model(loaded_img)
    file = Path(output_dir) / output_file
    print(f"Saving upgraded image to {file}")
    ImageLoader.save_image(output_img, str(file))

if __name__ == "__main__":
    upgrade_image_quality(
        input_file=Path("0.jpeg"),
        output_file=Path("0_upgraded.jpeg")
    )