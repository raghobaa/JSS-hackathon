import speech_recognition as sr

def recognize_speech_from_microphone():
    recognizer = sr.Recognizer()
    microphone = sr.Microphone()

    with microphone as source:
        recognizer.adjust_for_ambient_noise(source)
        print("Listening... Speak now!")
        audio = recognizer.listen(source)

    try:
        # Recognize speech using Google's speech recognition API
        text = recognizer.recognize_google(audio)
        print("You said: ", text)
    except sr.RequestError as e:
        # API was unreachable or unresponsive
        print(f"Error: Could not request results from Google Speech Recognition service; {e}")
    except sr.UnknownValueError:
        # Speech was unintelligible
        print("Error: Unable to recognize speech. Please try again.")
    except Exception as e:
        # Catch all other exceptions
        print(f"An unexpected error occurred: {e}")

if __name__ == "__main__":
    recognize_speech_from_microphone()
