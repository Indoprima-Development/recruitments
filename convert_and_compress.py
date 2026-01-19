import os
from PIL import Image

dirs = ["public/photo/slides1", "public/photo/slides2", "public/photo/slides3"]

for d in dirs:
    if not os.path.exists(d):
        continue
    print(f"Processing {d}...")
    for f in os.listdir(d):
        if f.lower().endswith('.png'):
            full_path = os.path.join(d, f)
            name_no_ext = os.path.splitext(f)[0]
            new_path = os.path.join(d, name_no_ext + ".jpg")
            
            try:
                img = Image.open(full_path)
                # Convert to RGB (remove alpha) for JPG
                if img.mode in ("RGBA", "P"):
                    img = img.convert("RGB")
                    
                # Resize first if very large (e.g. > 1920)
                if max(img.size) > 1920:
                    ratio = 1920 / max(img.size)
                    new_size = (int(img.size[0] * ratio), int(img.size[1] * ratio))
                    img = img.resize(new_size, Image.Resampling.LANCZOS)
                
                # Save as JPG with quality 80
                img.save(new_path, "JPEG", quality=80)
                
                # Check size
                size_mb = os.path.getsize(new_path) / (1024 * 1024)
                print(f"  Converted {f} to {os.path.basename(new_path)}: {size_mb:.2f} MB")
                
                # If still > 1MB, reduce quality
                quality = 80
                while size_mb > 1.0 and quality > 30:
                    quality -= 10
                    img.save(new_path, "JPEG", quality=quality)
                    size_mb = os.path.getsize(new_path) / (1024 * 1024)
                    print(f"    Reduced quality to {quality}, new size: {size_mb:.2f} MB")

                # Remove original PNG
                # os.remove(full_path) 
                # (User didn't explicitly ask to delete, but keeping them might be confusing? 
                # I'll keep them for safety but maybe rename them? Or just leave them.)
                # Actually, to free space and "compress", replacing is implied. 
                # But safer to just leave them and change the code to use the new smaller ones.
                
            except Exception as e:
                print(f"Error processing {f}: {e}")
