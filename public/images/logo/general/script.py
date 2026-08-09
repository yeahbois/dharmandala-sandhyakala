import os
from PIL import Image
import pillow_heif

def process_images(input_folder, output_folder, new_width):
    """
    Resizes all images in the input folder and converts them to WebP format.
    The original aspect ratio is preserved.
    
    Supported input formats: .jpg, .jpeg, .png, .heic, .tiff, .bmp, .gif, .webp
    
    Parameters:
    input_folder (str): Path to the folder containing the original images
    output_folder (str): Path to the folder where the processed images will be saved
    new_width (int): The desired width for the resized images
    """
    # Create the output folder if it doesn't exist
    os.makedirs(output_folder, exist_ok=True)
    
    # Supported image extensions
    supported_extensions = ['.jpg', '.jpeg', '.png', '.heic', '.tiff', '.bmp', '.gif', '.webp']
    
    # Loop through all files in the input folder
    for filename in os.listdir(input_folder):
        # Check file extension
        file_ext = os.path.splitext(filename)[1].lower()
        
        if file_ext in supported_extensions:
            # Full path to the input image
            image_path = os.path.join(input_folder, filename)
            
            try:
                # Special handling for .heic files
                if file_ext == '.heic':
                    heif_file = pillow_heif.read_heif(image_path)
                    image = Image.frombytes(
                        mode=heif_file.mode, 
                        size=heif_file.size, 
                        data=heif_file.data
                    )
                else:
                    image = Image.open(image_path)
                
                # Calculate the new height while maintaining the aspect ratio
                original_width, original_height = image.size
                aspect_ratio = original_height / original_width
                new_height = int(new_width * aspect_ratio)
                
                # Resize the image
                image = image.resize((new_width, new_height), resample=Image.LANCZOS)
                
                # Construct the new filename (append width and change extension to .webp)
                new_filename = os.path.splitext(filename)[0] + str(new_width) + '.webp'
                output_path = os.path.join(output_folder, new_filename)
                
                # Save as WebP (preserving transparency)
                image.save(output_path, 'WEBP', lossless=True if file_ext == '.png' else False)
                
                print(f"Processed and saved: {new_filename}")
            
            except Exception as e:
                print(f"Error processing {filename}: {e}")

# Example usage
# This will process all images in the current directory and save them as 4000px wide WebP files
process_images('./', './', 64)