import os

replacements = {
    "Our Partner": "আমাদের পার্টনার",
    "Career": "ক্যারিয়ার",
    "Contact Us": "যোগাযোগ"
}

html_files = [f for f in os.listdir('.') if f.endswith('.html')]

for file_path in html_files:
    if not os.path.isfile(file_path): continue
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()
    
    new_content = content
    for old, new in replacements.items():
        new_content = new_content.replace(f'>{old}</a>', f'>{new}</a>')
        new_content = new_content.replace(f'"{old}"', f'"{new}"') # Sometimes in alt or titles
        
    if new_content != content:
        with open(file_path, 'w', encoding='utf-8') as f:
            f.write(new_content)
        print(f"Updated {file_path}")
