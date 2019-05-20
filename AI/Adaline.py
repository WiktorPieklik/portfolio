import numpy as np


class Adaline:

    def __init__(self, n_iter=10, eta=0.1, random_seed=1):
        self.n_iter = n_iter
        self.eta = eta
        self.random_seed = random_seed

    def fit(self, X, y):
        self.__init_weights(X.shape[1])

        self.cost_ = []
        for i in range(self.n_iter):
            error = (y - self.net_input(X))
            self.w_[1:] += self.eta * error.dot(X)
            self.w_[0] += self.eta * error.sum()
            cost = (error**2).sum() * 0.5
            self.cost_.append(cost)
        return self

    def __init_weights(self, size):
        rgen = np.random.RandomState(self.random_seed)
        self.w_ = rgen.normal(loc=0.0, scale=0.1, size=1+size)

    def net_input(self, X):
        return np.dot(X, self.w_[1:]) + self.w_[0]

    def activation(self, X):
        return self.net_input(X)

    def predict(self, X):
        return np.where(self.activation(X) >= 0.0, 1, -1)