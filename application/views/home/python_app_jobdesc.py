import nltk
from nltk.corpus import stopwords, words
from nltk.stem import WordNetLemmatizer
from nltk.corpus.reader import wordnet
from nltk.tokenize import word_tokenize
from nltk.stem import PorterStemmer
import pandas as pd
from sklearn.metrics.pairwise import cosine_similarity
from sklearn.feature_extraction.text import TfidfVectorizer
import sys

# Download necessary NLTK resources
nltk.download('punkt')
nltk.download('wordnet')
nltk.download('stopwords')
nltk.download('words')

# Perform text preprocessing
lemmatizer = WordNetLemmatizer()
stop_words = set(stopwords.words('english'))
unnecessary_word = set(words.words())

import re
def preprocess_text(text):
    # Convert to lowercase
    text = text.lower()

    # Remove non-alphabetic characters
    text = re.sub('[^A-Za-z]', ' ', text)

    # Tokenize the text
    tokens = nltk.word_tokenize(text)
    ps = PorterStemmer()

    # Remove stopwords and lemmatize the tokens
    tokens = [lemmatizer.lemmatize(token) for token in tokens if token not in stop_words]

    # Join the tokens back into a single string
    preprocessed_text = ' '.join(tokens)

    return preprocessed_text

from nltk.corpus import stopwords
# nltk.download('stopwords')
# stop_words = set(stopwords.words('english'))

def remove_non_meaningful_words(text):
    tokens = nltk.word_tokenize(text)
    filtered_tokens = [word for word in tokens if word.lower() not in stop_words and word.isalpha() and len(word) > 2]
    return ' '.join(filtered_tokens)

def jobdesc_similarity(query):
    file_path = 'C:/xampp/htdocs/Personality_Prediction/application/views/home/static/csv_file/JobDesc.csv'
    df = pd.read_csv(file_path)
    df = df[['job_id', 'title', 'description']]
    text = df['description']
    text = text.apply(preprocess_text)
    text = text.apply(remove_non_meaningful_words)
    df['description'] = text

    query = preprocess_text(query)
    query = remove_non_meaningful_words(query)
    # Initialize the TF-IDF vectorizer
    vectorizer = TfidfVectorizer()

    # Fit and transform the text column
    tfidf_matrix = vectorizer.fit_transform(df['description'])

    # Transform the query
    query_vector = vectorizer.transform([query])

    # Compute the cosine similarity between the query vector and all text vectors
    similarity_scores = cosine_similarity(tfidf_matrix, query_vector)

    # Add the similarity scores as a new column in the DataFrame
    df['similarity_score'] = similarity_scores

    # Sort the DataFrame based on the similarity score
    df = df.sort_values(by='similarity_score', ascending=False)

    return df['title'][:5].to_numpy()

text = sys.argv[1]

array = jobdesc_similarity(text)

print(array[0], " || ", array[1], " || ", array[2], " || ", array[3], " || ", array[4])