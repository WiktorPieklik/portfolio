import math

class hamming_code_decoder:

    def __init__(self):
        self.__parity_bits = 0
        self.__errors = []
        self.__data = []

    def decode(self, encoded_data):
        self.__errors = []
        bin_positions = self.__generate_bin_position(encoded_data)
        parity_count, parity_positions = self.__get_parity_bits_positions(encoded_data)
        self.__count_parity_hamming(parity_count, encoded_data, bin_positions, parity_positions)
        return self.__data

    # region SOME_BULLSHIT
    def __get_parity_bits_positions(self, encoded_data):
        parity_count = math.ceil(math.log(len(encoded_data), 2))
        parity_positions = []

        for i in range(parity_count):
            parity_positions.append(self.__bin_value(2**i))
        return parity_count, parity_positions

    def __generate_bin_position(self, encoded_data: []):
        positions_indexes = []
        for i in range(len(encoded_data)):
            positions_indexes.append(self.__bin_value(i + 1))
        return positions_indexes

    def __count_parity_hamming(self, parity_count, encoded_data, positions_indexes, parity_indexes):
        encoded_data.reverse()  # dla wygody obliczen

        for i in range(parity_count):
            parity_counter = 0
            j = 0
            for j in range(i + j, len(encoded_data)):
                single_sing = positions_indexes[j]  # tu znajduje sie jeszcze cala liczba, np. 101
                if len(single_sing) >= i + 1:
                    single_sing = single_sing[-(i + 1)]
                    if single_sing == '1':
                        if encoded_data[j] == 1: #and positions_indexes[j] != parity_indexes[i]:
                            parity_counter += 1

            self.__errors.append(parity_counter % 2)

        self.__repair_data(encoded_data)
        self.__data = self.__retrieve_data(encoded_data, parity_indexes, positions_indexes)

        self.__data.reverse()

    def __repair_data(self, encoded_data):
        error_position = ""

        for i in range(len(self.__errors) - 1, -1, -1):
            error_position += str(self.__errors[i])

        if error_position == "":
            return

        error_dec_position = int(error_position, 2) - 1

        # if error position is out of range of data it means
        # more than one bit must have been flipped and data is
        # corrupted.
        if encoded_data.__len__() <= error_dec_position:
            ecoded_data = None
            return

        if error_dec_position > -1:
            if encoded_data[error_dec_position] == 1:
                encoded_data[error_dec_position] = 0
            else:
                encoded_data[error_dec_position] = 1

    def __retrieve_data(self, encoded_data, parity_positions, positions_indexes):
        data = []
        j = 0
        for i in range(len(encoded_data)):
            if j < len(parity_positions) and parity_positions[j] == positions_indexes[i]:
                j += 1
            else:
                data.append(encoded_data[i])
        return data

    def __bin_value(self, dec_value):
        return bin(dec_value)[2:]
    # endregion