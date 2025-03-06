from gtts import gTTS
import os

def text_to_speech(text):
    tts = gTTS(text=text, lang='en')
    tts.save("output.mp3")
    os.system("mpg321 output.mp3")  # Use 'mpg321' for Linux, 'afplay' for Mac, or 'start' for Windows

if __name__ == "__main__":
    while True:
        text = input("Enter text to convert to speech (type 'exit' to stop): ")
        if text.lower() == 'exit':
            break
        text_to_speech(text)
