import os
from PIL import Image

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
        if filename == "line.webp":
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
resize_images('../../../icons', '../../../icons', 98)