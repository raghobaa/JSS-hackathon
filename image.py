from google import genai
from google.genai import types

import PIL.Image

image = PIL.Image.open('image.png')

client = genai.Client(api_key="AIzaSyAkiZPjrbZycfzfNnWoVnIznDKC8GFy04o")
response = client.models.generate_content(
    model="gemini-2.0-flash",
    contents=["What is this image?", image])

print(response.text)