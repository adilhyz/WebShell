#!/bin/bash

# Resize semua PNG
mogrify -resize 1920x1080 *.jpg

# Konversi satu per satu ke WebP
for img in *.jpg; do
    base="${img%.jpg}"
    cwebp -q 77 "$img" -o "${base}.webp"
done

