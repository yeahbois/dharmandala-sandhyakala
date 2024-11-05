import os
from PIL import Image

def resize_images(input_folder, output_folder, new_width, new_height):
    """
    Resizes all images in the input folder and saves them to the output folder.
    The original images are preserved.
    
    Parameters:
    input_folder (str): Path to the folder containing the original images
    output_folder (str): Path to the folder where the resized images will be saved
    new_width (int): The desired width for the resized images
    new_height (int): The desired height for the resized images
    """
    # Create the output folder if it doesn't exist
    os.makedirs(output_folder, exist_ok=True)
    
    # Loop through all files in the input folder
    for filename in os.listdir(input_folder):
        # Check if the file is an image
        if filename.endswith(".jpg") or filename.endswith(".webp") or filename.endswith(".jpeg"):
            # Open the image
            image_path = os.path.join(input_folder, filename)
            image = Image.open(image_path)
            
            # Resize the image
            image = image.resize((new_width, new_height), resample=Image.BICUBIC)
            
            # Save the resized image to the output folder
            new_filename = os.path.splitext(filename)[0] + "128" + os.path.splitext(filename)[1]
            output_path = os.path.join(output_folder, new_filename)
            image.save(output_path)
            
            print(f"Resized and saved: {filename}")

# Example usage
resize_images('../osis/akad', '../osis/akad', 128, 171)
resize_images('../osis/bph', '../osis/bph', 128, 171)
resize_images('../osis/dhl', '../osis/dhl', 128, 171)
resize_images('../osis/k3or', '../osis/k3or', 128, 171)
resize_images('../osis/pudo', '../osis/pudo', 128, 171)
resize_images('../osis/rohani', '../osis/rohani', 128, 171)
resize_images('../osis/sasbud', '../osis/sasbud', 128, 171)