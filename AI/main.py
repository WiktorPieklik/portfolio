from Perceptron import Perceptron
from Adaline import Adaline
from AdalineSGD import AdalineSGD
import pandas as pd
import matplotlib.pyplot as plt
from matplotlib.colors import ListedColormap
import numpy as np

df = pd.read_csv('https://archive.ics.uci.edu/ml/machine-learning-databases/iris/iris.data', header=None)
y = df.iloc[0:100, 4].values
y = np.where(y == 'Iris-setosa', -1, 1)
X = df.iloc[0:100, [0, 2]].values


def plot_decision_regions(X, y, classifier, resolution=0.02):
    markers = ('s', 'x', 'o', '^', 'v')
    colors = ('red', 'blue', 'lightgray', 'gray', 'cyan')
    cmap = ListedColormap(colors[: len(np.unique(y))])

    x1_min, x1_max = X[:, 0].min() - 1, X[:, 0].max() + 1
    x2_min, x2_max = X[:, 1].min() - 1, X[:, 1].max() + 1

    xx1, xx2 = np.meshgrid(np.arange(x1_min, x1_max, resolution),
                           np.arange(x2_min, x2_max, resolution))

    Z = classifier.predict(np.array([xx1.ravel(), xx2.ravel()]).T)
    Z = Z.reshape(xx1.shape)

    plt.contourf(xx1, xx2, Z, alpha=0.4, cmap=cmap)
    plt.xlim(x1_min, x1_max)
    plt.ylim(x2_min, x2_max)

    # rysowanie probek
    for index, cl in enumerate(np.unique(y)):
        plt.scatter(x=X[y == cl, 0], y=X[y == cl, 1],
                    marker=markers[index], c=colors[index],
                    label=cl, alpha=0.8)


# standaryzacja danych
X_std = np.copy(X)
X_std[:, 0] = (X_std[:, 0] - X_std[:, 0].mean()) / X_std[:, 0].std()
X_std[:, 1] = (X_std[:, 1] - X_std[:, 1].mean()) / X_std[:, 1].std()

ada = AdalineSGD(n_iter=15, eta=0.01)
ada.fit(X_std, y)
plot_decision_regions(X_std, y, ada)
plt.xlabel('Dlugosc dzialki[std]')
plt.ylabel('Dlugosc platka[std]')
plt.legend(loc='upper left')
plt.show()

plt.plot(range(1, len(ada.cost_) + 1), ada.cost_, marker='o')
plt.xlabel('Ilosc epok')
plt.ylabel('Sredni koszt')
plt.show()
# adaline = Adaline(n_iter=15, eta=0.01)
# adaline.fit(X_std, y)
# plot_decision_regions(X_std, y, adaline)
# plt.title('Adaline - Gradient prosty')
# plt.xlabel('Dlugosc dzialki')
# plt.ylabel('Dlugosc platka')
# plt.legend(loc='upper left')
# plt.show()
#
# plt.plot(range(1, len(adaline.cost_) + 1), adaline.cost_, marker='o')
# plt.xlabel('Epoki')
# plt.ylabel('Suma kwadratow bledow')
# plt.show()

# ada = AdalineSGD(n_iter=15, eta=0.01).fit(X, y)
# plot_decision_regions(X_std, y, ada)
# plt.xlabel('Dlugosc dzialki [standaryzowana]')
# plt.ylabel('Dlugosc platka [standaryzowana]')
# plt.legend(loc='upper left')
# plt.show()
# plt.plot(range(1, len(ada.cost_) + 1), ada.cost_, marker='o')
# plt.xlabel('Liczba epok')
# plt.ylabel('Sredni koszt')
# plt.show()
# plt.show()


