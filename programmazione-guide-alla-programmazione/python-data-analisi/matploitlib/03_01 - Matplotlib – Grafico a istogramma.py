# -*- coding: utf-8 -*-
"""
Spyder Editor
Matplotlib – 03.01 - Grafico a iastogramma
This is a matplotlib example script file.
Website: https://computer4dummy.altervista.org
"""

import numpy as np
import pandas as pd
import matplotlib.pyplot as plt

A = pd.read_csv('C:/temp/data_1d.csv', header=None).as_matrix()

x = A[:,0]
y = A[:,1]

plt.hist(x)

plt.show()