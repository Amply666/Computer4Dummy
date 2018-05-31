# -*- coding: utf-8 -*-
"""
Spyder Editor
Matplotlib – Grafico scatter o di dispersione
This is a matplotlib example script file.
Website: https://computer4dummy.altervista.org/programmazione-guide-alla-programmazione/python-data-analisi/matplotlib-per-python/matplotlib-grafico-scatter-o-di-dispersione/
"""

import numpy as np
import pandas as pd
import matplotlib.pyplot as plt

A = pd.read_csv('C:/temp/data_1d.csv', header=None).as_matrix()

x = A[:,0]
y = A[:,1]

x_line = np.linspace(0,100,100)
y_line = 2*x_line + 1

plt.plot(x_line,y_line)
plt.scatter(x,y)

plt.show()