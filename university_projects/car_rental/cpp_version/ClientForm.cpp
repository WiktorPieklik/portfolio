#include "ClientForm.h"

carrental::ClientForm::ClientForm(int id, Form^ form)
{
	InitializeComponent();
	//
	//TODO: W tym miejscu dodaj kod konstruktora
	//
	clientId = id;
	loginForm = form;
	loadOffersTable();
}

carrental::ClientForm::~ClientForm()
{
	if (components)
	{
		delete components;
	}
}

System::Void carrental::ClientForm::logOut(System::Object^  sender, System::EventArgs^  e)
{
	this->Close();
	loginForm->Show();
}

void carrental::ClientForm::slidePanelEvents()
{

	if (hidden)
	{
		slidePanel->Width += 10;
		if (slidePanel->Width >= slidePanelMaxWidth)
		{
			timer1->Stop();
			hidden = false;
		}
	}
	else
	{
		slidePanel->Width -= 10;
		if (slidePanel->Width <= 0)
		{
			timer1->Stop();
			hidden = true;
		}
	}
}

System::Void carrental::ClientForm::timer1_Tick(System::Object^  sender, System::EventArgs^  e)
{
	slidePanelEvents();
}

System::Void carrental::ClientForm::displayOffers(System::Object^  sender, System::EventArgs^  e)
{
	//wyswietlanie tresci odpowiedniej kart
	offerPanel->BringToFront();
	if (!hidden)
		timer1->Start();
	loadOffersTable();
	marker->Top = offersButton->Top;
	welcomeLbl->Visible = false;
	infoLbl->Visible = false;
	pictureBox2->Visible = false;
}

System::Void carrental::ClientForm::displayOrders(System::Object^  sender, System::EventArgs^  e)
{
	loadOrdersTable();
	timer1->Start();
	marker->Top = ordersButton->Top;
	welcomeLbl->Visible = false;
	infoLbl->Visible = false;
	pictureBox2->Visible = false;
}

System::Void carrental::ClientForm::accountButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	if (!hidden)
	{
		timer1->Start();
	}
	marker->Top = accountButton->Top;
	welcomeLbl->Visible = false;
	infoLbl->Visible = false;
	pictureBox2->Visible = false;

	//wyœwietlanie treœci odpowiedniej kart
	accountPanel->BringToFront();


	MySqlCommand^ cmd = gcnew MySqlCommand("select * from wypozyczalnia.clients where clientID='" + clientId + "'", connecter);
	MySqlDataReader^ reader;
	try
	{
		connecter->Open();
		reader = cmd->ExecuteReader();
		reader->Read();
		CnameTextBox->Text = reader->GetString(1);
		CsurnameTextBox->Text = reader->GetString(2);
		CphoneNoTextBox->Text = reader->GetString(3);
		CidCardTextBox->Text = reader->GetString(4);
		CloginTextBox->Text = reader->GetString(5);
		CpasswordTextBox->Text = reader->GetString(6);
		CemailTextBox->Text = reader->GetString(7);
		connecter->Close();
	}
	catch (Exception^ ex)
	{
		MessageBox::Show("B³¹d ³adowania danych z bazy: \n" + ex->Message);
	}
}

System::Void carrental::ClientForm::infoButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	if (!hidden)
	{
		timer1->Start();
	}
	marker->Top = infoButton->Top;
	welcomeLbl->Visible = false;
	infoLbl->Visible = false;
	pictureBox2->Visible = false;

	//wyswietlanie tresci odpowiedniej karty
	infoPanel->BringToFront();
}

System::Void carrental::ClientForm::changeDataButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	changeDataButton->Visible = false;

	CnameTextBox->Enabled = true;
	CsurnameTextBox->Enabled = true;
	CphoneNoTextBox->Enabled = true;
	CidCardTextBox->Enabled = true;
	CemailTextBox->Enabled = true;
	CloginTextBox->Enabled = true;
	CpasswordTextBox->Enabled = true;

	acceptChangeButton->Visible = true;
}

System::Void carrental::ClientForm::acceptChangeButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	try
	{
		connecter->Open();
		MySqlCommand^ cmd = gcnew MySqlCommand("update wypozyczalnia.clients set name='" + CnameTextBox->Text + "', surname='" + CsurnameTextBox->Text + "', phoneNo='" + CphoneNoTextBox->Text + "', idCard='" + CidCardTextBox->Text + "', login='" + CloginTextBox->Text + "', password='" + CpasswordTextBox->Text + "', email='" + CemailTextBox->Text + "' where clientID='" + clientId + "'", connecter);
		cmd->ExecuteNonQuery();
		connecter->Close();
	}
	catch (Exception^ ex)
	{
		MessageBox::Show("B³¹d aktualizowania danych!: \n" + ex->Message);
	}

	changeDataButton->Visible = true;

	CnameTextBox->Enabled = false;
	CsurnameTextBox->Enabled = false;
	CphoneNoTextBox->Enabled = false;
	CidCardTextBox->Enabled = false;
	CemailTextBox->Enabled = false;
	CloginTextBox->Enabled = false;
	CpasswordTextBox->Enabled = false;

	acceptChangeButton->Visible = false;
}

System::Void carrental::ClientForm::deleteUser(System::Object^  sender, System::EventArgs^  e)
{
	MySqlCommand^ cmd = gcnew MySqlCommand("delete from wypozyczalnia.clients where clientID='" + clientId + "'", connecter);
	if (MessageBox::Show(this, "Czy na pewno chcesz usunaæ konto?", "Ostrze¿enie", MessageBoxButtons::YesNo, MessageBoxIcon::Warning) == System::Windows::Forms::DialogResult::Yes)
	{
		try
		{
			connecter->Open();
			cmd->ExecuteNonQuery();
			connecter->Close();

			this->Close();
			loginForm->Show();

		}
		catch (Exception^ ex)
		{
			MessageBox::Show("B³¹d usuwania konta: \n" + ex->Message);
		}
	}
}

void carrental::ClientForm::loadCarsTable()
{
	MySqlCommand^ carsCmd = gcnew MySqlCommand("select * from wypozyczalnia.cars", connecter);
	MySqlDataReader^ reader;
	try
	{
		connecter->Open();
		carsCount = 0;
		reader = carsCmd->ExecuteReader();
		while (reader->Read())
		{
			carsCount++;
		}
		connecter->Close();

		cars = gcnew array<Car^>(carsCount);
	}
	catch (Exception^ ex)
	{
		MessageBox::Show("B³¹d wczytywania aut1: \n" + ex->Message);
	}
	if (carsCount > 0)
	{
		try
		{
			///////////////////////////////////////
			connecter->Open();
			reader = carsCmd->ExecuteReader();
			int i = 0;
			while (reader->Read())
			{
				float capacity = (float)(Convert::ToDouble(reader->GetString(5)));
				float milleage = (float)(Convert::ToDouble(reader->GetString(4)));
				cars[i] = gcnew Car(reader->GetString(1), reader->GetString(2), reader->GetInt32(3), milleage, capacity, reader->GetInt32(6), reader->GetString(7), reader->GetString(8), reader->GetString(9), reader->GetInt16(0), reader->GetBoolean(10), reader->GetBoolean(11));
				i++;
			}
			connecter->Close();
			////////////////////////////////////
		}
		catch (Exception^ ex)
		{
			MessageBox::Show("B³¹d wczytywania aut2: \n" + ex->Message);
		}
	}
}

void carrental::ClientForm::loadOrdersTable()
{
	MySqlCommand^ cmd = gcnew MySqlCommand("select * from wypozyczalnia.orders where clientID='" + clientId + "'", connecter);
	MySqlDataReader^ reader;
	try
	{
		connecter->Open();
		reader = cmd->ExecuteReader();
		clientsOrderCount = 0;
		while (reader->Read())
		{
			clientsOrderCount++;
		}
		clientsOrders = gcnew array<Order^>(clientsOrderCount);
		orderControls = gcnew array<orderSlideControl^>(clientsOrderCount);
		connecter->Close();
		//////////////////
		connecter->Open();
		int i = 0;
		reader = cmd->ExecuteReader();
		while (reader->Read())
		{
			clientsOrders[i] = gcnew Order(reader->GetInt16(0), reader->GetString(1), reader->GetString(2), (float)Convert::ToDouble(reader->GetString(3)), (float)Convert::ToDouble(reader->GetString(4)), reader->GetBoolean(5), reader->GetInt16(6), reader->GetInt16(7));
			i++;
		}
		connecter->Close();
		/////////////////

		ordersPanel->Controls->Clear();
		int height = 42;
		int carId;
		for (int k = 0; k < clientsOrderCount; k++)
		{
			for (int j = 0; j < carsCount; j++)
			{
				if (cars[j]->getCarId() == clientsOrders[k]->getOrderCarID())
				{
					carId = j;
					break;
				}
			}
			orderControls[k] = gcnew orderSlideControl();
			orderControls[k]->carBrandAndModel->Text = cars[carId]->getCarInfoBrand() + " " + cars[carId]->getCarInfoModel();
			orderControls[k]->showButton->Click += gcnew System::EventHandler(this, &ClientForm::orderShowButtonClick);
			orderControls[k]->showButton->Tag = clientsOrders[k]->getOrderId();
			ordersPanel->Controls->Add(orderControls[k]);
			orderControls[k]->Location = System::Drawing::Point(27, height);
			height += 171; //zmiana po³o¿enia w dó³
		}
	}
	catch (Exception^ ex)
	{
		MessageBox::Show("B³¹d wczytywania zamówieñ: \n" + ex->Message);
	}
}

void carrental::ClientForm::orderShowButtonClick(System::Object^ sender, System::EventArgs^ e)
{
	orderDetailsPanel->BringToFront();
	timer1->Start();
	Button^ button = (Button^)sender;
	int orderId = (int)button->Tag;
	Car^ car;

	for (int i = 0; i < clientsOrderCount; i++)
	{
		if (clientsOrders[i]->getOrderId() == orderId)//znalezienie indeksu danego zamowienia w tablicy zamowien
		{
			orderId = i;
			break;
		}
	}
	////szukanie auta z zamowienia
	for (int i = 0; i < carsCount; i++)
	{
		if (cars[i]->getCarId() == clientsOrders[orderId]->getOrderCarID())
		{
			car = cars[i];
			break;
		}
	}

	orderDetailsBrand->Text = car->getCarInfoBrand();
	orderDetailsModel->Text = car->getCarInfoModel();
	orderDetailsCapacity->Text = Convert::ToString(car->getCarInfoCapacity());
	orderDetailsFuelType->Text = car->getCarInfoFuelType();
	orderDetailsGearboxType->Text = car->getCarInfoGearboxType();
	orderDetailsMilleage->Text = Convert::ToString(car->getCarInfoMilleage());
	orderDetailsNumberPlate->Text = car->getCarInfoNumberPlate();
	orderDetailsPowerhorse->Text = Convert::ToString(car->getCarInfoPowerhorse());
	orderDetailsProduction->Text = Convert::ToString(car->getCarInfoProductionYear());
	orderDetailsDayOfPurchase->Text = clientsOrders[orderId]->getOrderDateOfPurchase();
	orderDetailsDayOfReturn->Text = clientsOrders[orderId]->getOrderDateOfReturn();

	if (clientsOrders[orderId]->getDiscountGrantedState() == 0)
	{
		orderDetailsPrice->Text = Convert::ToString(clientsOrders[orderId]->getOrderPrice() - clientsOrders[orderId]->getOrderDiscount()) + " z³";
		orderDetailsPriceStrikeout->Text = Convert::ToString(clientsOrders[orderId]->getOrderPrice()) + " z³";
		orderDetailsPriceStrikeout->Visible = true;
		orderDetailsDiscount->Text = "przyznany w wysokoœci: " + clientsOrders[orderId]->getOrderDiscount() + " z³";
	}
	else
	{
		orderDetailsPriceStrikeout->Visible = false;
		orderDetailsPrice->Text = Convert::ToString(clientsOrders[orderId]->getOrderPrice()) + " z³";
		orderDetailsDiscount->Text = "nie zosta³ przyznany";
	}
}

void carrental::ClientForm::loadOffersTable()
{
	loadCarsTable(); //bez aut nie ma ofert
	offerPanel->Controls->Clear();
	MySqlCommand^ offerCmd = gcnew MySqlCommand("select * from wypozyczalnia.offers where available=0", connecter);
	MySqlDataReader^ reader;
	try
	{
		connecter->Open();
		offersCount = 0;
		reader = offerCmd->ExecuteReader();
		while (reader->Read())
		{
			offersCount++;
		}
		connecter->Close();

		offers = gcnew array<Offer^>(offersCount);
	}
	catch (Exception^ ex)
	{
		MessageBox::Show("B³¹d wczytywania ofert: \n" + ex->Message);
	}
	//////////////////////////////////////////////

	if (offersCount > 0)
	{
		Car^ car;
		try
		{
			connecter->Open();
			int i = 0;
			reader = offerCmd->ExecuteReader();
			while (reader->Read())
			{
				float price = (float)(Convert::ToDouble(reader->GetString(2)));
				int carId = reader->GetInt16(1);
				for (int j = 0; j < carsCount; j++) //szukanie auta o zadanym id
				{
					if (cars[j]->getCarId() == carId)
					{
						car = cars[j];
						break;
					}
				}
				offers[i] = gcnew Offer(reader->GetInt16(0), price, car);
				i++;
			}
			connecter->Close();
		}
		catch (Exception^ ex)
		{
			MessageBox::Show("B³¹d wczytywania ofert2: \n" + ex->Message);
		}

		offerControls = gcnew array<offerSlideControl^>(offersCount);
		int height = 20;
		int j = 1; //zmienna pomocnicza do pozycjonowania kontrolek
				   ///tworzenie kontrolek
		offerPanel->Controls->Clear();
		for (int i = 0; i < offersCount; i++)
		{

			offerControls[i] = gcnew offerSlideControl();
			offerControls[i]->showButton->Tag = offers[i]->getOfferCarId();
			offerControls[i]->brandLbl->Text = offers[i]->getOfferCarBrand();
			offerControls[i]->modelLbl->Text = offers[i]->getOfferCarModel();
			offerControls[i]->showButton->Click += gcnew System::EventHandler(this, &ClientForm::showDetailOfferClick);
			offerPanel->Controls->Add(offerControls[i]);
			if (j == 1)
				offerControls[i]->Location = System::Drawing::Point(32, height);
			if (j == 2)
				offerControls[i]->Location = System::Drawing::Point(352, height);
			if (j == 3)
				offerControls[i]->Location = System::Drawing::Point(672, height);
			j++;
			if (j > 3)
			{
				height += 194;
				j = 1;
			}
		}
	}
	/////////////////////////////////////////////
}

void carrental::ClientForm::showDetailOfferClick(System::Object^ sender, System::EventArgs^ e)
{
	Button^ button = (Button^)sender;
	int carId = (int)button->Tag;
	Offer^ offer;
	Car^ car;
	offerDetailsPanel->BringToFront();
	for (int i = 0; i < carsCount; i++)
	{
		if (cars[i]->getCarId() == carId)
		{
			car = cars[i];
			break;
		}
	}
	for (int i = 0; i < offersCount; i++)
	{
		if (offers[i]->getOfferCarId() == carId)
		{
			offer = offers[i];
			break;
		}
	}

	offerDetailsBrand->Text = car->getCarInfoBrand();
	offerDetailsBrand->Tag = offer->getOfferId();
	offerDetailsModel->Text = car->getCarInfoModel();
	offerDetailsModel->Tag = car->getCarId();
	offerDetailsCapacity->Text = Convert::ToString(car->getCarInfoCapacity());
	offerDetailsFuelType->Text = car->getCarInfoFuelType();
	offerDetailsGearboxType->Text = car->getCarInfoGearboxType();
	offerDetailsMilleage->Text = Convert::ToString(car->getCarInfoMilleage());
	offerDetailsNumberPlate->Text = car->getCarInfoNumberPlate();
	offerDetailsPowerhorse->Text = Convert::ToString(car->getCarInfoPowerhorse());
	offerDetailsProduction->Text = Convert::ToString(car->getCarInfoProductionYear());
	offerDetailsPrice->Text = Convert::ToString(offer->getOfferPrice());
	discountTextBox->Clear();
	priceSum->Text = "0";
}

System::Void carrental::ClientForm::goBackButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	offerPanel->BringToFront();
}

System::Void carrental::ClientForm::calculateButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	DateTime purchaseDate = Convert::ToDateTime(dateOfPurchasePicker->Text);
	DateTime^ returnDate = Convert::ToDateTime(dateOfReturnPicker->Text);
	TimeSpan^ daysCount = returnDate->Subtract(purchaseDate);
	int days = Convert::ToInt32(daysCount->Days);
	if (days > 0)
	{
		priceSum->Text = Convert::ToString(days*(Convert::ToDouble(offerDetailsPrice->Text)));
	}
	else
		MessageBox::Show("Na pewno chcesz takie daty?");
}

System::Void carrental::ClientForm::makeOrder(System::Object^  sender, System::EventArgs^  e)
{
	marker->Top = offersButton->Top;
	DateTime purchaseDate = Convert::ToDateTime(dateOfPurchasePicker->Text);
	DateTime^ returnDate = Convert::ToDateTime(dateOfReturnPicker->Text);
	TimeSpan^ daysCount = returnDate->Subtract(purchaseDate);
	int days = Convert::ToInt32(daysCount->Days);
	if (days > 0)
	{
		priceSum->Text = Convert::ToString(days*(Convert::ToDouble(offerDetailsPrice->Text)));
		float discount;
		if (discountTextBox->Text->Length == 0)
		{
			discount = 0;
		}
		else
		{
			if (discountTextBox->Text->Contains("."))
			{
				discountTextBox->Text = discountTextBox->Text->Replace(".", ",");
			}
			discount = (float)Convert::ToDouble(discountTextBox->Text);
		}
		MySqlCommand^ cmd = gcnew MySqlCommand("insert into wypozyczalnia.orders (dateOfPurchase,dateOfReturn,price,discount,carID,clientID) values ('" + Convert::ToString(dateOfPurchasePicker->Value) + "','" + Convert::ToString(dateOfReturnPicker->Value) + "','" + Convert::ToString(priceSum->Text) + "','" + Convert::ToString(discount) + "', '" + (int)offerDetailsModel->Tag + "','" + this->clientId + "')", connecter);
		MySqlCommand^ updateCar = gcnew MySqlCommand("update wypozyczalnia.cars set isRented=1 where carID='" + (int)offerDetailsModel->Tag + "'", connecter);
		MySqlCommand^ updateOffer = gcnew MySqlCommand("update wypozyczalnia.offers set available=1 where offerID='" + (int)offerDetailsBrand->Tag + "'", connecter);
		try
		{
			connecter->Open();
			cmd->ExecuteNonQuery();
			updateCar->ExecuteNonQuery();
			updateOffer->ExecuteNonQuery();
			MessageBox::Show("Dziêkujemy za z³o¿enie zamówienia");
			offerDetailsPrice->Text = "0";
			connecter->Close();
			loadOrdersTable();
			loadOffersTable();
		}
		catch (Exception^ ex)
		{
			MessageBox::Show("B³¹d sk³adania oferty: \n" + ex->Message);
		}
		offerPanel->BringToFront();
	}
	else
		MessageBox::Show("Wypo¿yczyæ mo¿na na co najmniej jeden dzieñ!");
}

System::Void carrental::ClientForm::goBackButton2_Click(System::Object^  sender, System::EventArgs^  e)
{
	offerPanel->BringToFront();
	timer1->Start();
}


