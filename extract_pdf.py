import sys
import os

# Add local lib to path
sys.path.append(os.path.join(os.getcwd(), '.temp_lib'))

try:
    from pypdf import PdfReader
except ImportError:
    print("pypdf not found. Please ensure it is installed.")
    sys.exit(1)

def extract_text_from_pdf(pdf_path, output_path):
    try:
        reader = PdfReader(pdf_path)
        text = ""
        for page in reader.pages:
            text += page.extract_text() + "\n"
        
        with open(output_path, 'w', encoding='utf-8') as f:
            f.write(text)
            
        return f"Successfully wrote to {output_path}"
    except Exception as e:
        return str(e)

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("Usage: python extract_pdf.py <pdf_path> [output_path]")
        sys.exit(1)
    
    pdf_path = sys.argv[1]
    output_path = sys.argv[2] if len(sys.argv) > 2 else "sequence_full.txt"
    print(extract_text_from_pdf(pdf_path, output_path))
