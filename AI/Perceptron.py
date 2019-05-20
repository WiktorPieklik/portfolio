import numpy as np


class Perceptron:

    def __init__(self, n_iter=10, eta=0.1, random_seed=1):
        self.n_iter = n_iter
        self.eta = eta
        self.random_seed = random_seed

    def fit(self, X, y):
        self.__init_weights(X.shape[1])

        self.errors_ = []
        for _ in range(self.n_iter):
            error = 0
            for xi, target in zip(X, y):
                update = self.eta * (target - self.predict(xi))
                self.w_[1:] += update * xi
                self.w_[0] += update
                error += int(update != 0.0)
            self.errors_.append(error)
        return self

    def __init_weights(self, size):
        rgen = np.random.RandomState(self.random_seed)
        self.w_ = rgen.normal(loc=0.0, scale=0.1, size=1+size)

    def net_input(self, X):
        return np.dot(X, self.w_[1:]) + self.w_[0]

    def predict(self, X):
        return np.where(self.net_input(X) >= 0.0, 1, -1)