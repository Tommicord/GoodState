from pathlib import Path
from os import listdir, rename
from uuid import uuid4

def rename_images(dir: str | Path):
    directory = Path(dir) if isinstance(dir, str) else dir

    # Avoid FileExistsError by renaming to a random uuid first
    for filename in listdir(directory):
        rename(directory / filename, directory / f"{uuid4()}.jpeg")

    for i,filename in enumerate(listdir(directory)):
        if filename.endswith(".jpeg"):
            rename(directory / filename, directory / f"{i}.jpeg")

if __name__ == "__main__":
    rename_images("assets/example")