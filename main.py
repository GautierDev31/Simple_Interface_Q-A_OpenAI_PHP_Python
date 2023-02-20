

import os
import requests
import json
import sys
import openai


# Put your API key here
openai.api_key = "YOUR-API-KEY-HERE"

# Question from the web page
question = str(sys.argv[1])

# Conditions before questionning OpenAI
prompt="""
Act like you are a spanish teacher. Your purpuse is only to respond to questions the spanish language.
It's important that if the question is not about the spanish language don't respond and tell that "you can't respond to the question" because you are just an english teacher.
Here is the question :
""" + question


response = openai.Completion.create(
	engine="text-davinci-002",
	prompt=prompt,
	temperature = 0.9,
	max_tokens=100
)

choices = response["choices"]

# Respond the text part from the JSON response
for item in response['choices']:
    print (item['text'])
