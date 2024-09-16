import joblib
import numpy as np
import sys
import json

# Load the model
model = joblib.load('model.pkl')

# Read input from stdin
input_data = json.load(sys.stdin)

# Process the input data
# Convert categorical features to numerical values if necessary
# For this example, we'll just convert everything to a list of floats (update based on your model's needs)

# Example conversion (update according to your needs):
def convert_to_float(value):
    try:
        return float(value)
    except ValueError:
        return 0.0

features = [
    convert_to_float(input_data.get('age', 0)),
    convert_to_float(input_data.get('cholesterol_level', 0))
    # Add more features according to your model requirements
]

# Make prediction
features = np.array(features).reshape(1, -1)
prediction = model.predict(features)

# Output the prediction
print(prediction[0])
