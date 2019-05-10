#include "OwnerForm.h"

carrental::OwnerForm::OwnerForm(Form^ form)
{
	InitializeComponent();
	//
	//TODO: W tym miejscu dodaj kod konstruktora
	//
	MySqlCommand^ cmd = gcnew MySqlCommand("select * from wypozyczalnia.clients where clientID > 1", connecter);
	MySqlCommand^ carsCmd = gcnew MySqlCommand("select * from wypozyczalnia.cars where isRented = 0", connecter);
	MySqlDataReader^ reader;
	try
	{
		//////////zliczenie ilu jest klientow w bazie poza adminem (id!=1)/////
		loginForm = form;
		connecter->Open();
		reader = cmd->ExecuteReader();
		while (reader->Read())
		{
			usersCount++;
		}
		connecter->Close();
		clients = gcnew array<Client^>(usersCount);
		userControls = gcnew array<userSlideControl^>(usersCount);

		////////zliczanie ile jest niewypozyczonych aut
	}
	catch (Exception^ ex)
	{
		MessageBox::Show("B³¹d wczytywania danych \n" + ex->Message);
	}
	displayUsers();
	loadCarsTable();
	loadOffersTable();
	if (offersCount > 0)
	{
		welcomePic->Visible = false;
	}
}

carrental::OwnerForm::~OwnerForm()
{
	if (components)
	{
		delete components;
	}
}

System::Void carrental::OwnerForm::logoutButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	this->Close();
	loginForm->Show();
}

void carrental::OwnerForm::slidePanelEvents()
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
		slidePanel->Width -= 22;
		if (slidePanel->Width <= 0)
		{
			timer1->Stop();
			hidden = true;
		}
	}
}

System::Void carrental::OwnerForm::timer1_Tick(System::Object^  sender, System::EventArgs^  e)
{
	slidePanelEvents();
}

System::Void carrental::OwnerForm::offersButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	if (!hidden)
		timer1->Start();
	marker->Top = offersButton->Top;
	offersPanel->BringToFront();
	offersSlidePanel->BringToFront();

}

System::Void carrental::OwnerForm::usersButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	if (!hidden) timer1->Start();
	marker->Top = usersButton->Top;
	usersPanel->BringToFront();
}

System::Void carrental::OwnerForm::ordersButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	if (!hidden)
	{
		timer1->Start();
	}
	marker->Top = ordersButton->Top;
	ordersPanel->BringToFront();
	loadOrdersTable();
}

System::Void carrental::OwnerForm::infoButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	if (!hidden)
	{
		timer1->Start();
	}
	marker->Top = infoButton->Top;
	infoPanel->BringToFront();
}

void carrental::OwnerForm::displayUsers()
{
	MySqlCommand^ cmd = gcnew MySqlCommand("select * from wypozyczalnia.clients where clientID > 1", connecter);
	MySqlDataReader^ reader;
	int height = 7;
	try
	{
		connecter->Open();
		reader = cmd->ExecuteReader();
		int i = 0;
		//////////////////////////////wczytanie danych/////////
		while (reader->Read())
		{
			clients[i] = gcnew Client(reader->GetInt16(0), reader->GetString(1), reader->GetString(2), reader->GetString(3), reader->GetString(4), reader->GetString(5), reader->GetString(6), reader->GetString(7));
			userControls[i] = gcnew userSlideControl();
			userControls[i]->nameLbl->Text = reader->GetString(1);
			userControls[i]->surnameLbl->Text = reader->GetString(2);
			userControls[i]->phoneNoLbl->Text = reader->GetString(3);
			userControls[i]->idCardLbl->Text = reader->GetString(4);
			userControls[i]->emailLbl->Text = reader->GetString(7);

			//////umieszczenie danych na usersSlidePanel/////////
			if (i != 0 && i % 2 == 0)
			{
				height += 161;
			}
			usersPanel->Controls->Add(userControls[i]);
			if (i % 2 == 0) //parzyste przesuwamy w dó³
			{
				userControls[i]->Location = System::Drawing::Point(41, height);

			}
			else //nieparzyste przesuwamy w prawo
			{

				userControls[i]->Location = System::Drawing::Point(542, height);
			}

			i++;
		}
		connecter->Close();
	}
	catch (Exception^ ex)
	{
		MessageBox::Show("B³¹d wczytywania danych do listy: \n" + ex->Message);
	}
}

void carrental::OwnerForm::loadOffersTable()
{
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
		welcomePic->Visible = false;
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
		offersPanel->Controls->Clear();
		int height = 20;
		int j = 1; //zmienna pomocnicza do pozycjonowania kontrolek
				   ///tworzenie kontrolek
		for (int i = 0; i < offersCount; i++)
		{

			offerControls[i] = gcnew offerSlideControl();
			offerControls[i]->showButton->Tag = offers[i]->getOfferCarId();
			offerControls[i]->brandLbl->Text = offers[i]->getOfferCarBrand();
			offerControls[i]->modelLbl->Text = offers[i]->getOfferCarModel();
			offerControls[i]->showButton->Click += gcnew System::EventHandler(this, &OwnerForm::showDetailOfferClick);
			offersPanel->Controls->Add(offerControls[i]);
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
	else
	{
		welcomePic->Visible = true;
	}
	/////////////////////////////////////////////
}

//obs³uga klikniêcia kontrolki offerControl
void carrental::OwnerForm::showDetailOfferClick(Object^ sender, System::EventArgs^  e)
{
	offerDetailsPanel->BringToFront();
	Button^ button = (Button^)sender;
	int carId = (int)button->Tag;
	for (int i = 0; i < offersCount; i++)
	{
		if (offers[i]->getOfferCarId() == carId)
		{
			brandLbl->Text = offers[i]->getOfferCarBrand();
			brandLbl->Tag = offers[i]->getOfferId();
			modelLbl->Text = offers[i]->getOfferCarModel();
			modelLbl->Tag = offers[i]->getOfferCarId();
			offerDetailpriceTextBox->Text = (Convert::ToString(offers[i]->getOfferPrice()));
			break;
		}
	}
}

void carrental::OwnerForm::loadOrdersTable()
{
	MySqlCommand^ cmd = gcnew MySqlCommand("select * from wypozyczalnia.orders", connecter);
	MySqlDataReader^ reader;
	ordersPanel->Controls->Clear();

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

		int height = 20;
		int j = 1; //zmienna pomocnicza do pozycjonowania kontrolek
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
			orderControls[k]->showButton->Click += gcnew System::EventHandler(this, &OwnerForm::showOrderButtonClick);
			orderControls[k]->showButton->Tag = clientsOrders[k]->getOrderId();
			ordersPanel->Controls->Add(orderControls[k]);
			if (j == 1)
				orderControls[k]->Location = System::Drawing::Point(32, height);
			if (j == 2)
				orderControls[k]->Location = System::Drawing::Point(543, height);

			j++;
			if (j > 2)
			{
				height += 181;
				j = 1;
			}
		}
	}
	catch (Exception^ ex)
	{
		MessageBox::Show("B³¹d wczytywania zamówieñ: \n" + ex->Message);
	}
}

void carrental::OwnerForm::showOrderButtonClick(System::Object^ sender, System::EventArgs^ e)
{
	Button^ button = (Button^)sender;
	int orderId = (int)button->Tag;
	grantDiscountButton->Tag = orderId;
	orderDetailsPanel->BringToFront();
	Car^ car;
	Client^ user;

	for (int i = 0; i < clientsOrderCount; i++)
	{
		if (clientsOrders[i]->getOrderId() == orderId)//znalezienie indeksu danego zamowienia w tablicy zamowien
		{
			orderId = i;
			break;
		}
	}
	/////szukanie klienta z zamowienia
	for (int i = 0; i < usersCount; i++)
	{
		if (clients[i]->getClientId() == clientsOrders[orderId]->getOrderClientID())
		{
			user = clients[i];
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
	orderDetailsBrand->Tag = car->getCarId();
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
	orderDetailsDiscount->Text = Convert::ToString(clientsOrders[orderId]->getOrderDiscount()) + " z³";
	orderDetailsName->Text = user->getClientName();
	orderDetailsSurname->Text = user->getClientSurname();
	orderDetailsEmail->Text = user->getClientEmail();
	orderDetailsIdentityCard->Text = user->getClientIdentityCard();
	orderDetailsPhoneNo->Text = user->getClientPhoneNo();

	if (clientsOrders[orderId]->getDiscountGrantedState() == 0)
	{
		orderDetailsPrice->Text = Convert::ToString(clientsOrders[orderId]->getOrderPrice() - clientsOrders[orderId]->getOrderDiscount()) + " z³";
		orderDetailsPriceStrikeout->Text = Convert::ToString(clientsOrders[orderId]->getOrderPrice()) + " z³";
		orderDetailsPriceStrikeout->Visible = true;
		grantedLbl->Visible = true;
		grantDiscountButton->Visible = false;
	}
	else
	{
		orderDetailsPrice->Text = Convert::ToString(clientsOrders[orderId]->getOrderPrice()) + " z³";
		orderDetailsPriceStrikeout->Visible = false;
		grantedLbl->Visible = false;
		grantDiscountButton->Visible = true;
	}
}

void carrental::OwnerForm::loadCarsTable()
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
		carsInOffer = gcnew array<Car^>(carsCount);
		carControls = gcnew array<carsSlideControl^>(carsCount);
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
			int k = 0; //zmienna pomocnicza do tworzenia carsInOffer
			connecter->Open();
			reader = carsCmd->ExecuteReader();
			int i = 0;
			while (reader->Read())
			{
				float capacity = (float)(Convert::ToDouble(reader->GetString(5)));
				float milleage = (float)(Convert::ToDouble(reader->GetString(4)));
				cars[i] = gcnew Car(reader->GetString(1), reader->GetString(2), reader->GetInt32(3), milleage, capacity, reader->GetInt32(6), reader->GetString(7), reader->GetString(8), reader->GetString(9), reader->GetInt16(0), reader->GetBoolean(10), reader->GetBoolean(11));
				if (reader->GetBoolean(11) != 1)
				{
					carsInOffer[k] = cars[i];
					k++;
				}
				i++;
			}
			connecter->Close();
			carsInOfferCount = k;
			///////////////////////////////////////
			editCarsPanel->Controls->Clear();
			int height = 20;
			int j = 1; //zmienna pomocnicza do pozycjonowania kontrolek


			for (int i = 0; i < carsCount; i++)
			{
				carControls[i] = gcnew carsSlideControl();
				carControls[i]->showButton->Tag = cars[i]->getCarId();
				carControls[i]->brandLbl->Text = cars[i]->getCarInfoBrand();
				carControls[i]->modelLbl->Text = cars[i]->getCarInfoModel();
				carControls[i]->showButton->Click += gcnew System::EventHandler(this, &OwnerForm::showDetailCarClick);
				editCarsPanel->Controls->Add(carControls[i]);
				if (j == 1)
					carControls[i]->Location = System::Drawing::Point(32, height);
				if (j == 2)
					carControls[i]->Location = System::Drawing::Point(352, height);
				if (j == 3)
					carControls[i]->Location = System::Drawing::Point(672, height);
				j++;
				if (j > 3)
				{
					height += 194;
					j = 1;
				}
			}
		}
		catch (Exception^ ex)
		{
			MessageBox::Show("B³¹d wczytywania aut2: \n" + ex->Message);
		}
	}
}

void carrental::OwnerForm::showDetailCarClick(System::Object^ sender, System::EventArgs^ e)
{
	editCarsPanel2->BringToFront();

	Button^ button = (Button^)sender;
	int carId = (int)button->Tag;
	for (int i = 0; i < carsCount; i++)
	{
		if (cars[i]->getCarId() == carId)
		{
			editCars2Brand->Text = cars[i]->getCarInfoBrand();
			editCars2Brand->Tag = cars[i]->getCarId();
			editCars2Model->Text = cars[i]->getCarInfoModel();
			editCars2Capacity->Text = (Convert::ToString(cars[i]->getCarInfoCapacity()));
			editCars2Milleage->Text = (Convert::ToString(cars[i]->getCarInfoMilleage()));
			editCars2NumberPlate->Text = cars[i]->getCarInfoNumberPlate();
			editCars2Powerhorse->Text = (Convert::ToString(cars[i]->getCarInfoPowerhorse()));
			editCars2productionYear->Text = (Convert::ToString(cars[i]->getCarInfoProductionYear()));
			editCars2FuelType->Text = cars[i]->getCarInfoFuelType();
			editCars2GearboxType->Text = cars[i]->getCarInfoGearboxType();
			break;
		}
	}
}

System::Void carrental::OwnerForm::addOfferButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	timer1->Start(); //schowanie szufladki
	addOfferPanel->BringToFront();
	marker->Top = offersButton->Top;
	String^ carName;
	carsComboBox->Items->Clear(); //aby nie dodawac tych samych rekordow
	loadCarsTable();
	for (int i = 0; i < carsInOfferCount; i++)
	{
		carName = carsInOffer[i]->getCarInfoBrand() + " " + carsInOffer[i]->getCarInfoModel();
		carsComboBox->Items->Add(carName);
	}
}

System::Void carrental::OwnerForm::addOffer(System::Object^  sender, System::EventArgs^  e)
{
	int id = carsComboBox->SelectedIndex;
	String^ price = offerPriceTextBox->Text;
	if (offerPriceTextBox->Text->Contains("."))
	{
		price = offerPriceTextBox->Text->Replace(".", ",");
	}
	MySqlCommand^ offerCmd = gcnew MySqlCommand("insert into wypozyczalnia.offers (carID, offerPrice) values('" + carsInOffer[id]->getCarId() + "', '" + price + "')", connecter);
	MySqlCommand^ updateCarOfferState = gcnew MySqlCommand("update wypozyczalnia.cars set inOffer=1 where carID='" + carsInOffer[id]->getCarId() + "'", connecter);
	try
	{
		connecter->Open();
		offerCmd->ExecuteNonQuery();
		connecter->Close();
		///////////////////
		connecter->Open();
		updateCarOfferState->ExecuteNonQuery();
		connecter->Close();
		//////////////////
		MessageBox::Show("Pomyœlnie dodano now¹ oferte");
		carsComboBox->SelectedIndex = -1; //znika fokus z ostatnio wybranej opcji
		textBox1->Clear();
		offerPriceTextBox->Text = "";
		offersPanel->BringToFront();
	}
	catch (Exception^ ex)
	{
		MessageBox::Show("Nie uda³o siê dodaæ oferty: \n" + ex->Message);
	}

	loadOffersTable(); //aktualizowanie tablicy ofert
}

System::Void carrental::OwnerForm::addCarButton_Click(System::Object^  sender, System::EventArgs^  e) //ta funkcja pokazuje formularz dodawania auta (formularz wprowadzania danych o nowym aucie)
{
	timer1->Start(); //schowanie szufladki
	marker->Top = offersButton->Top;
	addCarPanel->BringToFront();

}

System::Void carrental::OwnerForm::addCar2Button_Click(System::Object^  sender, System::EventArgs^  e)  //ta funkcja jest odpowiedzialna za dodanie auta do bazy
{
	String^ capacity = OcapacityTextBox->Text;
	String^ milleage = OmilleageTextBox->Text;
	///////////////////zamieniam ewentualna . na , zeby podczas konwersji String^ na float nie bylo bledow/////////
	if (OcapacityTextBox->Text->Contains("."))
	{
		capacity = OcapacityTextBox->Text->Replace(".", ",");

	}
	if (OmilleageTextBox->Text->Contains("."))
	{
		milleage = OmilleageTextBox->Text->Replace(".", ",");
	}

	MySqlCommand^ insertCar = gcnew MySqlCommand("insert into wypozyczalnia.cars (brand,model,productionYear,milleage,capacity,powerhorse,fuelType,gearboxType,numberPlate,isRented) values('" + ObrandTextBox->Text + "','" + OmodelTextBox->Text + "','" + Convert::ToInt32(OproductionYearTextBox->Text) + "','" + milleage + "','" + capacity + "','" + Convert::ToInt32(OpowerhorseTextBox->Text) + "','" + fuelTypeComboBox->Text->ToString() + "','" + gearboxTypeComboBox->Text->ToString() + "','" + OnumberPlateTextBox->Text + "','" + 0 + "')", connecter);
	try
	{
		connecter->Open();
		insertCar->ExecuteNonQuery();
		MessageBox::Show("Pomyœlnie dodano auto");
		//czyszczenie wprowadzonych danych w textBoxach
		OmodelTextBox->Clear();
		ObrandTextBox->Clear();
		OmilleageTextBox->Clear();
		OcapacityTextBox->Clear();
		OpowerhorseTextBox->Clear();
		OproductionYearTextBox->Clear();
		fuelTypeComboBox->SelectedIndex = -1;
		gearboxTypeComboBox->SelectedIndex = -1;
		OnumberPlateTextBox->Clear();
		connecter->Close();

		offersPanel->BringToFront();
	}
	catch (Exception^ ex)
	{
		MessageBox::Show("B³¹d dodawania auta: \n" + ex->Message);
	}

	loadCarsTable();//za³adowanie tablicy aut
}

System::Void carrental::OwnerForm::editCarsButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	timer1->Start();
	marker->Top = offersButton->Top;
	try
	{
		connecter->Open();
		editCarsPanel->BringToFront();
		connecter->Close();
		loadCarsTable();
	}
	catch (Exception^ ex)
	{
		MessageBox::Show("B³¹d wype³niania danych aut: \n" + ex->Message);
	}
}

System::Void carrental::OwnerForm::editOfferDetailsButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	offerDetailpriceTextBox->Enabled = true;
	editOfferDetailsButton->Visible = false;
	saveChangesOfferDetailButton->Visible = true;
}

System::Void carrental::OwnerForm::saveChangesOfferDetailButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	if (offerDetailpriceTextBox->Text->Contains("."))
	{
		offerDetailpriceTextBox->Text = offerDetailpriceTextBox->Text->Replace(".", ",");
	}
	MySqlCommand^ cmd = gcnew MySqlCommand("update wypozyczalnia.offers set offerPrice='" + offerDetailpriceTextBox->Text + "' where offerID='" + (int)brandLbl->Tag + "'", connecter);
	try
	{
		connecter->Open();
		cmd->ExecuteNonQuery();
		MessageBox::Show("Pomyœlnie zaktualizowano ofertê");
		connecter->Close();

		saveChangesOfferDetailButton->Visible = false;
		editOfferDetailsButton->Visible = true;
		offerDetailpriceTextBox->Enabled = false;
		offersPanel->BringToFront();
	}
	catch (Exception^ ex)
	{
		MessageBox::Show("B³¹d aktualizowania oferty: \n" + ex->Message);
	}
	loadOffersTable();
}

System::Void carrental::OwnerForm::deleteOfferDetailButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	if (MessageBox::Show(this, "Czy na pewno chcesz usun¹æ ofertê?", "Uwaga", MessageBoxButtons::YesNo, MessageBoxIcon::Warning) == System::Windows::Forms::DialogResult::Yes)
	{
		MySqlCommand^ cmd = gcnew MySqlCommand("delete from wypozyczalnia.offers where offerID='" + (int)brandLbl->Tag + "'", connecter);
		MySqlCommand^ updateCar = gcnew MySqlCommand("update wypozyczalnia.cars set inOffer=0 where carID='" + (int)modelLbl->Tag + "'", connecter);
		try
		{
			connecter->Open();
			cmd->ExecuteNonQuery();
			updateCar->ExecuteNonQuery();
			MessageBox::Show("Pomyœlnie usuniêto oferte");
			connecter->Close();
			offersPanel->Controls->Clear();
			loadOffersTable();//aktualizacja ofert
			offersPanel->BringToFront();
		}
		catch (Exception^ ex)
		{
			MessageBox::Show("B³¹d usuwania oferty: \n" + ex->Message);
		}

	}
}

System::Void carrental::OwnerForm::goBackButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	offersPanel->BringToFront();
}

System::Void carrental::OwnerForm::goToCarListButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	editCarsPanel->BringToFront();
}

System::Void carrental::OwnerForm::deleteCarButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	//usuwajac auto trzeba usunac zamowienie, ktore zawiera to auto!!!!
	Boolean found = false;
	if (MessageBox::Show(this, "Czy na pewno chcesz usun¹æ auto?", "Uwaga", MessageBoxButtons::YesNo, MessageBoxIcon::Warning) == System::Windows::Forms::DialogResult::Yes)
	{
		for (int i = 0; i < offersCount; i++)
		{
			if (offers[i]->getOfferCarId() == (int)editCars2Brand->Tag)
			{
				found = true;
				MessageBox::Show("Wpierw usuñ ofertê z tym autem zanim usuniesz auto!");
				break;
			}
		}
		if (!found)
		{
			MySqlCommand^ cmd = gcnew MySqlCommand("delete from wypozyczalnia.cars where carID='" + (int)editCars2Brand->Tag + "'", connecter);
			MySqlCommand^ deleteOrder = gcnew MySqlCommand("delete from wypozyczalnia.orders where carID='" + (int)editCars2Brand->Tag + "'", connecter);
			try
			{
				connecter->Open();
				cmd->ExecuteNonQuery();
				deleteOrder->ExecuteNonQuery();
				MessageBox::Show("Pomyœlnie usuniêto auto");
				connecter->Close();
				editCarsPanel->BringToFront();
				loadCarsTable();
				loadOffersTable();
			}
			catch (Exception^ ex)
			{
				MessageBox::Show("B³¹d usuwania auta: \n" + ex->Message);
			}
		}
	}
}

System::Void carrental::OwnerForm::editCars2EditButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	editCars2Brand->Enabled = true;
	editCars2Capacity->Enabled = true;
	editCars2FuelType->Enabled = true;
	editCars2GearboxType->Enabled = true;
	editCars2Milleage->Enabled = true;
	editCars2Model->Enabled = true;
	editCars2NumberPlate->Enabled = true;
	editCars2Powerhorse->Enabled = true;
	editCars2productionYear->Enabled = true;
	editCars2EditButton->Visible = false;
	editCars2SaveButton->Visible = true;
}


System::Void carrental::OwnerForm::editCars2SaveButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	MySqlCommand^ cmd = gcnew MySqlCommand("update wypozyczalnia.cars set brand='" + editCars2Brand->Text + "', model='" + editCars2Model->Text + "',productionYear='" + Convert::ToInt32(editCars2productionYear->Text) + "', milleage='" + editCars2Milleage->Text + "', capacity='" + editCars2Capacity->Text + "', powerhorse='" + Convert::ToInt32(editCars2Powerhorse->Text) + "', fuelType='" + editCars2FuelType->Text + "', gearboxType='" + editCars2GearboxType->Text + "', numberPlate='" + editCars2NumberPlate->Text + "' where carID='" + (int)editCars2Brand->Tag + "'", connecter);
	try
	{
		connecter->Open();
		cmd->ExecuteNonQuery();
		MessageBox::Show("Pomyœlnie zaktualizowano informacje");
		connecter->Close();
		loadCarsTable();
		loadOffersTable();

		editCars2Brand->Enabled = false;
		editCars2Capacity->Enabled = false;
		editCars2FuelType->Enabled = false;
		editCars2GearboxType->Enabled = false;
		editCars2Milleage->Enabled = false;
		editCars2Model->Enabled = false;
		editCars2NumberPlate->Enabled = false;
		editCars2Powerhorse->Enabled = false;
		editCars2productionYear->Enabled = false;
		editCars2EditButton->Visible = true;
		editCars2SaveButton->Visible = false;
		editCarsPanel->BringToFront();
	}
	catch (Exception^ ex)
	{
		MessageBox::Show("B³¹d aktualizowania danych auta: \n" + ex->Message);
	}
}


System::Void carrental::OwnerForm::showMoreButton_Click(System::Object^  sender, System::EventArgs^  e) //obs³uguje zdarzenie wciœniêcia przycisku dwóch strza³ek zwróconych w prawo
{
	timer1->Start();
}

System::Void carrental::OwnerForm::grantDiscount(System::Object^  sender, System::EventArgs^  e)
{
	if (MessageBox::Show(this, "Czy na pewno? \nZmiany bêd¹ nieodwracalne", "Uwaga", MessageBoxButtons::YesNo, MessageBoxIcon::Warning) == System::Windows::Forms::DialogResult::Yes)
	{
		MySqlCommand^ cmd = gcnew MySqlCommand("update wypozyczalnia.orders set discountGranted=0 where orderID='" + (int)grantDiscountButton->Tag + "'", connecter);
		try
		{
			connecter->Open();
			cmd->ExecuteNonQuery();
			MessageBox::Show("Przyznano upust");
			connecter->Close();
			grantedLbl->Visible = true;
			grantDiscountButton->Visible = false;
			loadOrdersTable();
			ordersPanel->BringToFront();
		}
		catch (Exception^ ex)
		{
			MessageBox::Show("B³¹d przyznawania upustu: \n" + ex->Message);
		}
	}
}

System::Void carrental::OwnerForm::goBackButton2_Click(System::Object^  sender, System::EventArgs^  e)
{
	ordersPanel->BringToFront();
}

System::Void carrental::OwnerForm::remakeOfferButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	if (MessageBox::Show(this, "Czy na pewno?", "Uwaga", MessageBoxButtons::YesNo, MessageBoxIcon::Warning) == System::Windows::Forms::DialogResult::Yes)
	{
		MySqlCommand^ updateCar = gcnew MySqlCommand("update wypozyczalnia.cars set isRented=0 where carID='" + (int)orderDetailsBrand->Tag + "'", connecter);
		MySqlCommand^ updateOffer = gcnew MySqlCommand("update wypozyczalnia.offers set available=0 where carID='" + (int)orderDetailsBrand->Tag + "'", connecter);

		try
		{
			connecter->Open();
			updateCar->ExecuteNonQuery();
			updateOffer->ExecuteNonQuery();
			connecter->Close();
			MessageBox::Show("Pomyœlnie przywrócono ofertê do obiegu");
			marker->Top = offersButton->Top;
			loadOffersTable();
			offersPanel->BringToFront();
		}
		catch (Exception^ ex)
		{
			MessageBox::Show("B³¹d przywracania oferty: \n" + ex->Message);
		}
	}
}


