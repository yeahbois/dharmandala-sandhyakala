import os
from PIL import Image
import pillow_heif

def convert_images_to_webp(input_folder, output_folder):
    """
    Converts all supported image formats in the input folder to WebP.
    
    Supported input formats: .jpg, .jpeg, .png, .heic, .tiff, .bmp, .gif
    
    Parameters:
    input_folder (str): Path to the folder containing the original images
    output_folder (str): Path to the folder where the converted WebP images will be saved
    """
    # Create the output folder if it doesn't exist
    os.makedirs(output_folder, exist_ok=True)
    
    # Supported image extensions
    supported_extensions = ['.jpg', '.jpeg', '.png', '.heic', '.tiff', '.bmp', '.gif']
    
    # Loop through all files in the input folder
    for filename in os.listdir(input_folder):
        # Check file extension
        file_ext = os.path.splitext(filename)[1].lower()
        if file_ext in supported_extensions:
            # Full path to the input image
            image_path = os.path.join(input_folder, filename)
            
            try:
                # Special handling for .heic files
                if filename.lower().endswith('.heic'):
                    heif_file = pillow_heif.read_heif(os.path.join(input_folder, filename))
                    image = Image.frombytes(
                        mode=heif_file.mode, 
                        size=heif_file.size, 
                        data=heif_file.data
                    )
                # Handle other supported image formats
                elif file_ext in supported_extensions:
                    image = Image.open(os.path.join(input_folder, filename))
                else:
                    continue
                    
                # Construct the new filename with .webp extension
                new_filename = os.path.splitext(filename)[0] + '.webp'
                output_path = os.path.join(output_folder, new_filename)
                
                # Convert and save as WebP
                # Convert to RGB mode for images with transparency to ensure compatibility
                if image.mode in ('RGBA', 'LA'):
                    background = Image.new('RGB', image.size, (255, 255, 255))
                    background.paste(image, mask=image.split()[-1])
                    background.save(output_path, 'WEBP')
                else:
                    image.save(output_path, 'WEBP')
                
                print(f"Converted: {filename} to {new_filename}")
            
            except Exception as e:
                print(f"Error converting {filename}: {e}")

def resize_images(input_folder, output_folder, new_width):
    """
    Resizes all images in the input folder and saves them to the output folder.
    The original aspect ratio is preserved, and the resized images are named with "new" appended.
    
    Parameters:
    input_folder (str): Path to the folder containing the original images
    output_folder (str): Path to the folder where the resized images will be saved
    new_width (int): The desired width for the resized images
    """
    # Create the output folder if it doesn't exist
    os.makedirs(output_folder, exist_ok=True)
    
    # Loop through all files in the input folder
    for filename in os.listdir(input_folder):
        # Check if the file is an image
        if filename.endswith(".webp"):
            # Open the image
            image_path = os.path.join(input_folder, filename)
            image = Image.open(image_path)
            
            # Calculate the new height while maintaining the aspect ratio
            original_width, original_height = image.size
            aspect_ratio = original_height / original_width
            new_height = int(new_width * aspect_ratio)
            
            # Resize the image
            image = image.resize((new_width, new_height), resample=Image.BICUBIC)
            
            # Construct the new filename with "new" appended
            new_filename = os.path.splitext(filename)[0] + str(new_width) + os.path.splitext(filename)[1]
            output_path = os.path.join(output_folder, new_filename)
            
            # Save the resized image to the output folder
            image.save(output_path)
            
            print(f"Resized and saved: {new_filename}")

# Example usage
convert_images_to_webp('./', './')

# Example usage
resize_images('./', './', 514)