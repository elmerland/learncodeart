import os.path
import sys

# Get the input path for an article.
def get_article_input_path(article):
    basepath = os.path.dirname(__file__)
    return os.path.abspath(os.path.join(basepath, 'articles', article))

# Get the output path for an article
def get_article_output_path(article):
    article = article.strip('\n ')
    article = article[:len(article)-4]
    basepath = os.path.dirname(__file__)
    return os.path.abspath(os.path.join(basepath, '..', 'articles', article + '.php'))

def get_folder_path(folder_name, file_name):
    basepath = os.path.dirname(__file__)
    return os.path.abspath(os.path.join(basepath, folder_name, file_name))

def get_parent_folder_path(folder_name, file_name):
    basepath = os.path.dirname(__file__)
    return os.path.abspath(os.path.join(basepath, '..', folder_name, file_name))

# Writes a block of text to the specified file with the specified number of tabs
def write_text_block(out_file, text_array, indentation_level):
    # Get specified level of indentation
    tabs = ''
    for i in range(indentation_level):
        tabs += '\t'
    # Write text block to file
    for line in text_array:
        out_file.write(tabs + line)

# Gets the next non-empty line of text from the specfied file
def get_next_line(in_file):
    while True:
        line = in_file.readline()
        if line == '\n':
            continue
        else:
            return line