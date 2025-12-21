
import os
import re

def apply_colors(directory):
    skinparam_block = """
' Color Customization
skinparam {
    BackgroundColor white
    ArrowColor #4C5FD5
    
    ' Activity Diagram specific
    ActivityBackgroundColor white
    ActivityBorderColor #4C5FD5
    ActivityStartColor #4C5FD5
    ActivityEndColor #4C5FD5
    ActivityBarColor #4C5FD5
    ActivityDiamondBackgroundColor white
    ActivityDiamondBorderColor #4C5FD5
    
    ' Notes
    NoteBackgroundColor #FBBF24
    NoteBorderColor #FBBF24
    
    ' Error/Warning (custom styles if needed)
    ' Error: #EF4444
}
"""
    
    for filename in os.listdir(directory):
        if not filename.endswith(".puml"):
            continue
            
        filepath = os.path.join(directory, filename)
        with open(filepath, 'r', encoding='utf-8') as f:
            content = f.read()

        # Remove existing styling similar to previous scripts rules
        # We want to replace the old block if it exists
        
        # 1. Remove specific skinparam block we added/existing ones
        new_content = re.sub(r"skinparam\s+{[\s\S]*?}", "", content)
        new_content = new_content.replace("' Color Customization", "")
        
        # 2. Clean up newlines
        new_content = re.sub(r"\n\s*\n\s*\n", "\n\n", new_content)
        
        # 3. Insert new block
        if "@startuml" in new_content:
             new_content = re.sub(r"(@startuml.*)", r"\1\n" + skinparam_block, new_content, count=1)
             
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(new_content)
        print(f"Updated {filename}")

if __name__ == "__main__":
    target_dir = r"C:\Users\ahmed\Herd\darisLMS\desiagn\ahmed\activetysDigram"
    apply_colors(target_dir)
