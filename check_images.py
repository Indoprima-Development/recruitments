import os
from PIL import Image

dirs = ["public/photo/slides1", "public/photo/slides2", "public/photo/slides3"]

for d in dirs:
    print(f"Checking {d}...")
    if not os.path.exists(d):
        print(f"Directory {d} not found")
        continue

    for f in os.listdir(d):
        if f.lower().endswith(('.png', '.jpg', '.jpeg')):
            p = os.path.join(d, f)
            try:
                img = Image.open(p)
                print(f"{p}: {img.size} - {os.path.getsize(p)/1024/1024:.2f} MB")
            except Exception as e:
                print(f"Error reading {f}: {e}")
