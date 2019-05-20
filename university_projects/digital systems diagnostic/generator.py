from enum import Enum
import numpy as np


class EncodingType(Enum):
    HAMMING = 1
    SIMPLE_PARITY_BIT = 2
    CONVOLUTIONAL = 3


class Generator:
    """
    Konstruktor klasy Generatora
    :param data_size: Określa wielkość generowanych danych, domyślnie 7 bitów
    :param data_type: Określa rodzaj kodowania informacji, domyślnie kodowanie Hamminga
    """
    def __init__(self, data_size=10, data_type=EncodingType.CONVOLUTIONAL):
        self.data_type = data_type
        self.__data_size = data_size  # dlugosc danych
        self.__data_buffer = []  # bufor, w ktorym znajduja sie wygenerowane dane i gotowe do dalszej pracy
        self.data_array = None  # dane, ktore zostaly wygenerowane (i zakodowane)
        self.__data_encoded = []  # zakodowane dane

    """
    Metoda ustawiająca długość tworzonych danych 
    :param size: Określa nową długość dla data_array
    """
    def set_signal_length(self, size):
        self.__data_size = size

    """
    Metoda ustawiająca nowy typ kodowania
    :param data_type: Zmienna typu enum ustawiająca nowy typ kodowania
    """
    def set_encode(self, data_type: EncodingType):
        self.data_type = data_type

    """
    Metoda generująca dane do zakodowania. Dane mają rozkład normalny (gaussowski), z wartością średnią = 0.5
    odchyleniem standardowym = 0.01
    """
    def __generate_data(self, data_size):
        data = np.zeros(data_size)
        random_generator = np.random.RandomState()
        data = random_generator.normal(loc=0.5, scale=0.01, size=data_size)
        data = np.where(data >= 0.5, 1, 0)
        return data.tolist()

    """
    Prosta metoda sprawdzajaca warunek czy generowac dodatkowe dane.
    Stworzona tylko dla czytelności kodu
    :param data_length_to_generate: Zmienna okreslajaca liczbe bitow do pobrania -> ustalane w __get_data()
    :return: Wartość true lub false -> generowac dane, czy nie
    """
    def __should_generate(self, data_length_to_generate):
        if len(self.__data_buffer) < data_length_to_generate:
            return True
        return False

    """
    Metoda odpowiadająca za losowanie dodatkowych bitow do bufora
    :param data_length_to_generate: Zmienna okreslajaca liczbe bitow do pobrania -> ustalane w __get_data()
    """
    def __append_extra_data(self, data_length_to_generate):
        old_data = self.__data_buffer
        new_data_count = data_length_to_generate - len(self.__data_buffer)
        self.__data_buffer = old_data + self.__generate_data(new_data_count)
        self.__data_size = len(self.__data_buffer)

    """
    Metoda odpowiedzialna za aktualizowanie stanu bufora.
    Przesuniecie informacji w przypadku gdy data_length_to_generate jest mniejsza od stanu bufora
    Wyzerowanie stanu bufora w przeciwnym razie
    :param data_length_to_generate: Zmienna okreslajaca liczbe bitow do pobrania -> ustalane w __get_data()
    """
    def __update_data_buffer(self, data_length_to_generate):
        if data_length_to_generate < len(self.__data_buffer):
            self.data_array = self.__data_buffer[:data_length_to_generate]
            self.__data_buffer = self.__data_buffer[data_length_to_generate:]
            self.__data_size = len(self.data_array)
        else:
            self.data_array = self.__data_buffer
            self.__data_buffer = []

    """
    Metoda zbierająca w sobie 3 powyższe metody.
    Używana w każdej metodzie kodowania informacji
    Przygotowuje bufor i dane(ktore maja byc kodowane) do dzialania
    :param data_length_to_generate: Zmienna okreslajaca liczbe bitow do pobrania -> ustalane w __get_data()
    """
    def __prepare_buffer(self, data_length_to_generate):
        self.__data_encoded = []

        if data_length_to_generate > 0:
            if self.__should_generate(data_length_to_generate):
                self.__append_extra_data(data_length_to_generate)

            self.__update_data_buffer(data_length_to_generate)

    """
    Metoda, ktora wstawia liste podana w parametrze do bufora
    :param data_array: Zmienna, ktora powinna byc typu list. W niej przekazywane sa bity do bufora
    """
    def set_data(self, data_array: []):
        self.__data_buffer = data_array
        self.__data_size = len(self.__data_buffer)

    """
    Metoda, ktora koduje wygenerowane bity danych wg okreslonego kodowania
    :return bits: Lista zakodowanych bitow
    """
    def get_data(self, data_length_to_generate=10):
        bits = []

        if self.data_type == EncodingType.HAMMING:
            self.__create_hamming_code(data_length_to_generate)
            bits.extend(self.__data_encoded)
        elif self.data_type == EncodingType.CONVOLUTIONAL:
            self.__create_convolutional_code(data_length_to_generate)
            bits.extend(self.__data_encoded)
        else:
            self.__create_simple_parity_bit(data_length_to_generate)
            bits.extend(self.__data_encoded)
        return bits

    # region SIMPLE_PARITY_BIT
    """
    Metoda kodujaca dane z wykorzystaniem dodatkowego bitu parzystosci
    """
    def __create_simple_parity_bit(self, data_length_to_generate):

        self.__prepare_buffer(data_length_to_generate)

        self.__data_encoded += self.data_array
        parity_count = 0
        for i in self.data_array:
            if i == 1:
                parity_count += 1

        self.__data_encoded.insert(0, parity_count % 2)
    # endregion

    # region CONVOLUTIONAL

    # #######################
    # Kodowanie splotowe (n,k,m) = (2,1,3), rate_code = 0.5 -> na każdy bit wejścia przypadają dwa bity wyjścia
    # n - ilosc bitow wyjsciowych
    # k - ilosc bitow wejsciowych
    # m - ilosc komorek rejestru przesuwnego
    # wielomiany tworzące: g1 = (1,1,1), g2 = (1,1,0) -> zgodnie z wielomianami Busganga dla rate_code = 0.5
    # #######################

    """
    Metoda kodująca dane wykorzystujac kod splotowy
    """
    def __create_convolutional_code(self, data_length_to_generate):

        self.__prepare_buffer(data_length_to_generate)

        shift_register = [0] * 3  # rozmiar rejestru to 3, stan poczatkowy to (0,0,0)

        for i in range(self.__data_size - 1, -1, -1):
            self.__shift_right(self.data_array[i], shift_register)
            self.__calculate_modulos(shift_register)

    """
    Metoda wyliczajaca sumy modulo zgodnie z wielomianami tworzacymi.
    Tworzone sa tutaj zakodowane dane.
    :param shift_register: Referencja do software'owego rejestru przesuwnego
    """
    def __calculate_modulos(self, shift_register):
        modulo_1 = (shift_register[0] + shift_register[1] + shift_register[2]) % 2
        modulo_2 = (shift_register[0] + shift_register[1]) % 2
        self.__data_encoded.append(modulo_1)
        self.__data_encoded.append(modulo_2)

    """
    Metoda przesuwająca software'owy rejestr przesuwny w prawo i dodaje nowy bit do najmłodszej komorki rejestru
    :param next_input: Nowy bit do dodania do rejestru
    :param shift_register: Referencja do software'owego rejestru przesuwnego
    """
    def __shift_right(self, next_input, shift_register):
        shift_register[2] = shift_register[1]
        shift_register[1] = shift_register[0]
        shift_register[0] = next_input

    # endregion

    # region HAMMING
    """
    Metoda kodujaca dane zgodnie z kodowaniem Hamminga
    """
    def __create_hamming_code(self, data_length_to_generate):

        self.__prepare_buffer(data_length_to_generate)

        self.data_array = self.data_array[::-1]  # dla wygody obliczen
        positions_indexes = self.__generate_bin_position()
        parity_count, parity_bits_position = self.__parity_bits_positions()

        new_size = parity_count + self.__data_size

        self.__allocate_parity_bits(new_size, parity_count, parity_bits_position, positions_indexes)

        self.__count_parity_hamming(parity_count, new_size, positions_indexes, parity_bits_position)

    """
    Metoda zliczająca ilość bitów odpowiednio dla danego bitu parzystości.
    Parzysta ilość = 0, nieparzysta = 1
    :param parity_count: Ilość bitów parzystości dla danego zbioru danych
    :param encoding_size: Długość danych po zakodowaniu
    :param positions_indexes: Pomocnicza lista przetrzymująca binarne pozycje w liście -> nie trzeba się przejmować indeksowaniem listy od 0
    :param parity_indexes: Pomocnicza lista przetrzymująca binarne pozycje bitów parzystości
    """
    def __count_parity_hamming(self, parity_count, encoding_size, positions_indexes, parity_indexes):
        for i in range(parity_count):
            parity_counter = 0
            j = 0
            for j in range(i + j, encoding_size):
                single_sing = positions_indexes[j]  # tu znajduje sie jeszcze cala liczba, np. 101
                if len(single_sing) >= i + 1:
                    single_sing = single_sing[-(i + 1)]
                    if single_sing == '1':
                        if self.__data_encoded[j] == 1:
                            parity_counter += 1
            dec_index = int(parity_indexes[i], 2) - 1  # pozycja bitu parzystosci w zakodowanych danych
            self.__data_encoded[dec_index] = parity_counter % 2

        self.data_array = self.data_array[::-1]
        self.__data_encoded.reverse()  # dane byly obliczane w sposob, ze pozycja najbardziej na lewo byla najmlodsza (o indeksie 0), a powinna byc pozycja najstarsza

    """
    Metoda wyliczająca binarne pozycje bitów parzystości w zakodowanym zestawie danych.
    :returns r, parity_positions: Odpowiednio liczba bitów parzystości i lista pozycji tych bitów zapisana binarnie
    """
    def __parity_bits_positions(self):
        r = 0
        parity_positions = []
        while pow(2, r) < self.__data_size + 1 + r:  # obliczenie ilosci redundantnych bitow
            r += 1

        for i in range(0, r):  # zapisanie binarnie pozycji redundantnych bitow
            parity_positions.append(self.__bin_value(pow(2, i)))

        return r, parity_positions

    """
    Metoda generujaca liste kolejnych pozycji zapisanych binarnie
    :return positions_indexes: Lista wszystkich pozycji zapisanych binarnie
    """
    def __generate_bin_position(self):
        positions_indexes = []
        for i in range(self.__data_size):
            positions_indexes.append(self.__bin_value(i + 1))
        return positions_indexes

    """
    Metoda pomocnicza do generowania wartosci binarnej z pominięciem prefiksu '0b'
    :param dec_value: Wartość decymalna, która ma być zmieniona na binarny ekwiwalent
    :return: Wartość binarna zmiennej dec_value
    """
    def __bin_value(self, dec_value):
        return bin(dec_value)[2:]

    """
    Metoda wstawiająca w miejsce bitów parzystości wartość -1 i przepisująca wygenerowane dane
    :param new_size: Rozmiar danych po zakodowaniu
    :param parity_count: Ilość bitow parzystości
    :param parity_bits_positions: Pozycje bitów parzystości zapisane binarnie
    :param positions_indexes: Pozycje listy danych zapisanych binarnie
    """
    def __allocate_parity_bits(self, new_size, parity_count, parity_bits_position, positions_indexes):
        j = 0
        raw_data = 0
        # wstawienie bitow parzystosci na odpowiednie miejsca i nadanie im wartosci -1
        for i in range(new_size):
            if j < parity_count and self.__bin_value(i + 1) == parity_bits_position[j]:
                self.__data_encoded.append(-1)
                j += 1
            else:
                self.__data_encoded.append(self.data_array[raw_data])
                raw_data += 1
            if i > self.__data_size:
                positions_indexes.append(self.__bin_value(i))  # dodanie brakujacych indeksow pozycji
        positions_indexes.append(self.__bin_value(new_size))  # dodanie ostatniego brakujacego indeksu pozycji
    # endregion

if __name__ == '__main__':
    # przykładowa implementacja
    generator = Generator()
    generator.set_data([1,0,1,1,1])
    encoded_bits = generator.get_data(5)
    print('Surowe bity:')
    print(generator.data_array)
    print('Zakodowana informacja:')
    print(encoded_bits)