from PIL import Image, ImageEnhance
import os

def reduce_brightness(image_path, output_path, reduction_factor=0.4):
    try:
        # Open the image
        img = Image.open(image_path)
        
        # Create brightness enhancer
        enhancer = ImageEnhance.Brightness(img)
        
        # Reduce brightness (0.25 = 75% reduction)
        darkened_img = enhancer.enhance(reduction_factor)
        
        # Save the modified image
        darkened_img.save(output_path)
        print(f"Successfully created darkened image: {output_path}")
        
    except Exception as e:
        print(f"Error processing image: {str(e)}")

def main():
    # Get all jpg files in the current directory
    current_dir = os.path.dirname(os.path.abspath(__file__))
    # jpg_files = [f for f in os.listdir(current_dir) if f.lower().endswith('.jpg')]
    # webp_files = [f for f in os.listdir(current_dir) if f.lower().endswith('.webp')]
    
    # if not jpg_files:
    #     print("No JPG files found in the current directory.")
    #     return
    
    # Process each JPG file
    # for jpg_file in jpg_files:
    #     input_path = os.path.join(current_dir, jpg_file)
    #     output_path = os.path.join(current_dir, f"darkened_{jpg_file}")
    #     reduce_brightness(input_path, output_path)

    # Process a certain WebP file
    # for webp_file in webp_files:
    #     if webp_file == "637A8750.webp":
    #         input_path = os.path.join(current_dir, webp_file)
    #         output_path = os.path.join(current_dir, f"darkened_{webp_file}")
    #         reduce_brightness(input_path, output_path)

    for f in os.listdir(current_dir):
        if f == "IMG_0122.webp":
            input_path = os.path.join(current_dir, f)
            output_path = os.path.join(current_dir, f"darkened_{f}")
            reduce_brightness(input_path, output_path)

if __name__ == "__main__":
    main()