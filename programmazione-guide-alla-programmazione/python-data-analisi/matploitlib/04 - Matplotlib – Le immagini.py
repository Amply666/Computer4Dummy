# -*- coding: utf-8 -*-
"""
Spyder Editor
Matploitlib - Le immagini
This is a matplotlib example script file.
Website: https://computer4dummy.altervista.org
"""

import pandas as pd
import matplotlib.pyplot as plt
#Caricare il file dataset
df = pd.read_csv("C:\\temp\\train.csv")
#Visualizzare le dimensioni del file
print df.shape
#Trasformarlo in un a matrice
M = df.as_matrix()
#prendere in considerazione solo la prima riga del dataset
im = M[0,1:]
#Visualizzare le dimensioni della prima riga
print im.shape
#Trasformarlo in una matrice 28x28
im = im.reshape(28, 28)
#Verificare la dimensione della matrice 28x28
print im.shape
#Visualizzare l'immagine a colori (256 colori)
plt.imshow(im)
#Visualizzare l'immagine in scala di grigi
plt.imshow(im, cmap='gray')
#Visualizzare il negativo in scala di grigi
plt.imshow(255 - im, cmap='gray')