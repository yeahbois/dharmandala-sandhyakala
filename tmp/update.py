import json
import os

filepath = r'c:\Users\marce\workplace\dharmandala-sandhyakala\database\data\cabinet.json'

with open(filepath, 'r', encoding='utf-8') as f:
    data = json.load(f)

def update_names(obj):
    if isinstance(obj, dict):
        if 'members' in obj and isinstance(obj['members'], list):
            for member in obj['members']:
                if 'name' in member:
                    first_name = member['name'].split()[0]
                    member['name'] = f"Kevin"
        for key, value in obj.items():
            update_names(value)
    elif isinstance(obj, list):
        for item in obj:
            update_names(item)

update_names(data)

with open(filepath, 'w', encoding='utf-8') as f:
    json.dump(data, f, indent=2)

print("Updated cabinet.json successfully.")
