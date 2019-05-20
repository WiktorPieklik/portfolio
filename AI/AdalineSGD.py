import numpy as np


class AdalineSGD:

    def __init__(self, n_iter=10, eta=0.01, random_seed=1, is_shuffle=True):
        self.n_iter = n_iter
        self.eta = eta
        self.random_seed = random_seed
        self.is_shuffle = is_shuffle
        self.w_initialized = False

    def fit(self, X, y):
        self.__init_weights(X.shape[1])
        self.cost_ = []

        for i in range(self.n_iter):
            if self.is_shuffle:
                X, y = self.__shuffle(X, y)
            cost = []
            for xi, target in zip(X, y):
                cost.append(self.__update_weights(xi, target))
            avg_cost = sum(cost) / len(y)
            self.cost_.append(avg_cost)
        return self

    def partial_fit(self, X, y):
        if not self.w_initialized:
            self.__init_weights(X.shape[1])

        #  przekazny został zbiór dancyh
        if y.ravel().shape[0] > 1:
            for xi, target in zip(X, y):
                self.__update_weights(xi, target)

        else:  # przekazane sa pojedyncze dane
            self.__update_weights(X, y)

    def __shuffle(self, X, y):
        permutation = np.random.permutation(len(y))
        return X[permutation], y[permutation]

    def __init_weights(self, size):
        rgen = np.random.RandomState(self.random_seed)
        self.w_ = rgen.normal(loc=0.0, scale=0.1, size=1+size)
        self.w_initialized = True

    def __update_weights(self, xi, target):
        error = self.eta * (target - self.net_input(xi))
        self.w_[1:] += error * xi
        self.w_[0] += self.eta * error
        cost = 0.5 * error**2
        return cost

    def net_input(self, X):
        return np.dot(X, self.w_[1:]) + self.w_[0]

    def activation(self, X):
        return self.net_input(X)

    def predict(self, X):
        return np.where(self.activation(X) >= 0.0, 1, -1)