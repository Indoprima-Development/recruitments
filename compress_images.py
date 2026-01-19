import os
from PIL import Image

dirs = ["public/photo/slides1", "public/photo/slides2", "public/photo/slides3"]
MAX_SIZE_MB = 1.0
MAX_DIMENSION = 1920

def compress_image(path):
    try:
        img = Image.open(path)
        original_size = os.path.getsize(path) / (1024 * 1024)

        # If already small enough, skip (unless dimensions are huge?)
        # Actually user wants < 1MB.
        if original_size <= MAX_SIZE_MB:
            print(f"Skipping {path} (already {original_size:.2f} MB)")
            return

        print(f"Compressing {path} (Size: {original_size:.2f} MB, Dims: {img.size})...")

        # Resize if larger than MAX_DIMENSION
        if max(img.size) > MAX_DIMENSION:
            ratio = MAX_DIMENSION / max(img.size)
            new_size = (int(img.size[0] * ratio), int(img.size[1] * ratio))
            img = img.resize(new_size, Image.Resampling.LANCZOS)
            print(f"  Resized to {img.size}")

        # Save to a temporary buffer or file to check size?
        # We can just overwrite with optimize=True.
        # Check if it has alpha channel. If it's a photo (slide), it might not need alpha.
        # But if it's PNG, it might use transparency.

        # Try saving as PNG optimized
        img.save(path, optimize=True)

        new_size = os.path.getsize(path) / (1024 * 1024)
        print(f"  New Size: {new_size:.2f} MB")

        if new_size > MAX_SIZE_MB:
            # If still too big, we might need to be more aggressive
            # Resize down further? Or accept it?
            # For PNG, size reduction is hard without losing details or transparency.
            # Let's try 1280 if > 1MB
            if max(img.size) > 1280:
                print("  Still > 1MB. Resizing to 1280...")
                ratio = 1280 / max(img.size)
                new_size_px = (int(img.size[0] * ratio), int(img.size[1] * ratio))
                img = img.resize(new_size_px, Image.Resampling.LANCZOS)
                img.save(path, optimize=True)
                final_size = os.path.getsize(path) / (1024 * 1024)
                print(f"  Final Size: {final_size:.2f} MB")
            else:
                 print("  Warning: Still > 1MB but already resized to 1280 or smaller. Stopping.")

    except Exception as e:
        print(f"Error processing {path}: {e}")

for d in dirs:
    if not os.path.exists(d):
        continue
    for f in os.listdir(d):
        if f.lower().endswith('.png'):
            compress_image(os.path.join(d, f))
