#ifndef OwnerForm_h
#define OwnerForm_h

#include "Client.h";
#include "userSlideControl.h";
#include "Car.h";
#include <string>;
#include "offerSlideControl.h";
#include "Offer.h";
#include "carsSlideControl.h";
#include "orderSlideControl.h";
#include "Order.h";
namespace carrental {

	using namespace System;
	using namespace System::ComponentModel;
	using namespace System::Collections;
	using namespace System::Windows::Forms;
	using namespace System::Data;
	using namespace System::Drawing;
	using namespace MySql::Data::MySqlClient;

	/// <summary>
	/// Podsumowanie informacji o OwnerForm
	/// </summary>
	public ref class OwnerForm : public System::Windows::Forms::Form
	{
	private:
		String ^ connectionString = L"datasource=localhost;port=3307;username=root;password=root";
		MySqlConnection^ connecter = gcnew MySqlConnection(connectionString);
		int slidePanelMaxWidth = 410;
		Boolean hidden = true;
		int usersCount = 0;
		int carsCount = 0;
		int carsInOfferCount = 0;
		int offersCount = 0;
		int clientsOrderCount = 0;
		array<Client^>^ clients;
		array<Car^>^ cars;
		array<Car^>^ carsInOffer; //aby uniknac mozliwosci dodania auta do comboBoxa gdy istnieje juz oferta z konkretnym autem
		array<Offer^>^ offers;
		Form^ loginForm;
		array<userSlideControl^>^ userControls;
		array<offerSlideControl^>^ offerControls;
		array<carsSlideControl^>^ carControls;
		array<orderSlideControl^>^ orderControls;
		array<Order^>^ clientsOrders;



	private: System::Windows::Forms::Timer^  timer1;
	private: System::Windows::Forms::Panel^  offersPanel;


	private: System::Windows::Forms::Panel^  infoPanel;
	private: System::Windows::Forms::Label^  label13;
	private: System::Windows::Forms::Label^  label12;
	private: System::Windows::Forms::Label^  label11;
	private: System::Windows::Forms::Label^  label10;
	private: System::Windows::Forms::Label^  label9;

	private: System::Windows::Forms::Panel^  usersPanel;
	private: System::Windows::Forms::Panel^  addOfferPanel;
	private: System::Windows::Forms::Button^  createOfferButton;

	private: System::Windows::Forms::TextBox^  offerPriceTextBox;

	private: System::Windows::Forms::Label^  label3;
	private: System::Windows::Forms::Label^  label2;
	private: System::Windows::Forms::ComboBox^  carsComboBox;
	private: System::Windows::Forms::PictureBox^  welcomePic;

	private: System::Windows::Forms::Button^  addCarButton;
	private: System::Windows::Forms::Button^  addOfferButton;

	private: System::Windows::Forms::Label^  label4;
	private: System::Windows::Forms::TextBox^  textBox1;
	private: System::Windows::Forms::Panel^  addCarPanel;
	private: System::Windows::Forms::Button^  addCar2Button;
	private: System::Windows::Forms::TextBox^  OnumberPlateTextBox;
	private: System::Windows::Forms::Label^  label18;

	private: System::Windows::Forms::Label^  label17;

	private: System::Windows::Forms::Label^  label16;
	private: System::Windows::Forms::TextBox^  OpowerhorseTextBox;
	private: System::Windows::Forms::Label^  label15;
	private: System::Windows::Forms::TextBox^  OcapacityTextBox;
	private: System::Windows::Forms::Label^  label14;
	private: System::Windows::Forms::TextBox^  OmilleageTextBox;
	private: System::Windows::Forms::Label^  label8;
	private: System::Windows::Forms::TextBox^  OproductionYearTextBox;
	private: System::Windows::Forms::Label^  label7;
	private: System::Windows::Forms::TextBox^  OmodelTextBox;
	private: System::Windows::Forms::Label^  label6;
	private: System::Windows::Forms::TextBox^  ObrandTextBox;
	private: System::Windows::Forms::Label^  label5;
	private: System::Windows::Forms::ComboBox^  gearboxTypeComboBox;
	private: System::Windows::Forms::ComboBox^  fuelTypeComboBox;
	private: System::Windows::Forms::Panel^  editCarsPanel;

	private: System::Windows::Forms::Button^  editCarsButton;
	private: System::Windows::Forms::Panel^  offerDetailsPanel;
	private: System::Windows::Forms::Button^  saveChangesOfferDetailButton;
	private: System::Windows::Forms::Button^  deleteOfferDetailButton;
	private: System::Windows::Forms::Button^  editOfferDetailsButton;
	private: System::Windows::Forms::Label^  label19;
	private: System::Windows::Forms::TextBox^  offerDetailpriceTextBox;
	private: System::Windows::Forms::Label^  brandLbl;



	private: System::Windows::Forms::Button^  goBackButton;
	private: System::Windows::Forms::Panel^  editCarsPanel2;
	private: System::Windows::Forms::Button^  deleteCarButton;
	private: System::Windows::Forms::Label^  label28;
	private: System::Windows::Forms::ComboBox^  editCars2GearboxType;
	private: System::Windows::Forms::ComboBox^  editCars2FuelType;
	private: System::Windows::Forms::TextBox^  editCars2NumberPlate;
	private: System::Windows::Forms::Label^  label20;
	private: System::Windows::Forms::Label^  label21;
	private: System::Windows::Forms::Label^  label22;
	private: System::Windows::Forms::TextBox^  editCars2Powerhorse;
	private: System::Windows::Forms::TextBox^  editCars2Capacity;
	private: System::Windows::Forms::Label^  label23;
	private: System::Windows::Forms::TextBox^  editCars2Milleage;
	private: System::Windows::Forms::Label^  label24;
	private: System::Windows::Forms::TextBox^  editCars2productionYear;
	private: System::Windows::Forms::Label^  label25;
	private: System::Windows::Forms::TextBox^  editCars2Model;
	private: System::Windows::Forms::Label^  label26;
	private: System::Windows::Forms::TextBox^  editCars2Brand;
	private: System::Windows::Forms::Label^  label27;
	private: System::Windows::Forms::Button^  goToCarListButton;
private: System::Windows::Forms::Button^  editCars2SaveButton;
private: System::Windows::Forms::Button^  editCars2EditButton;
private: System::Windows::Forms::Button^  showMoreButton;
private: System::Windows::Forms::Panel^  ordersPanel;
private: System::Windows::Forms::Panel^  orderDetailsPanel;
private: System::Windows::Forms::Button^  grantDiscountButton;
private: System::Windows::Forms::Label^  orderDetailsDiscount;
private: System::Windows::Forms::Label^  orderDetailsPrice;
private: System::Windows::Forms::Label^  orderDetailsDayOfReturn;
private: System::Windows::Forms::Label^  orderDetailsDayOfPurchase;
private: System::Windows::Forms::Label^  label40;
private: System::Windows::Forms::Label^  label39;
private: System::Windows::Forms::Label^  label38;
private: System::Windows::Forms::Label^  label37;
private: System::Windows::Forms::Label^  orderDetailsNumberPlate;
private: System::Windows::Forms::Label^  orderDetailsGearboxType;
private: System::Windows::Forms::Label^  orderDetailsFuelType;
private: System::Windows::Forms::Label^  orderDetailsPowerhorse;
private: System::Windows::Forms::Label^  orderDetailsCapacity;
private: System::Windows::Forms::Label^  orderDetailsMilleage;
private: System::Windows::Forms::Label^  orderDetailsProduction;
private: System::Windows::Forms::Label^  orderDetailsModel;
private: System::Windows::Forms::Label^  orderDetailsBrand;
private: System::Windows::Forms::Label^  label29;
private: System::Windows::Forms::Label^  label30;
private: System::Windows::Forms::Label^  label31;
private: System::Windows::Forms::Label^  label32;
private: System::Windows::Forms::Label^  label33;
private: System::Windows::Forms::Label^  label34;
private: System::Windows::Forms::Label^  label35;
private: System::Windows::Forms::Label^  label36;
private: System::Windows::Forms::Label^  label41;
private: System::Windows::Forms::Label^  grantedLbl;
private: System::Windows::Forms::Label^  orderDetailsPriceStrikeout;
private: System::Windows::Forms::Button^  goBackButton2;
private: System::Windows::Forms::Label^  orderDetailsEmail;
private: System::Windows::Forms::Label^  orderDetailsIdentityCard;
private: System::Windows::Forms::Label^  orderDetailsPhoneNo;
private: System::Windows::Forms::Label^  orderDetailsSurname;
private: System::Windows::Forms::Label^  orderDetailsName;
private: System::Windows::Forms::Label^  label46;
private: System::Windows::Forms::Label^  label45;
private: System::Windows::Forms::Label^  label44;
private: System::Windows::Forms::Label^  label43;
private: System::Windows::Forms::Label^  label42;
private: System::Windows::Forms::Button^  remakeOfferButton;
private: System::Windows::Forms::Label^  modelLbl;



	private: System::Windows::Forms::Panel^  offersSlidePanel;

	public:
		OwnerForm(Form^ form);

	protected:
		~OwnerForm();
	private: System::Windows::Forms::Panel^  panel1;
	protected:
	private: System::Windows::Forms::Panel^  panel2;
	private: System::Windows::Forms::Panel^  panel3;
	private: System::Windows::Forms::Label^  label1;
	private: System::Windows::Forms::Button^  logoutButton;
	private: System::Windows::Forms::PictureBox^  pictureBox1;
	private: System::Windows::Forms::Panel^  slidePanel;
	private: System::Windows::Forms::Button^  offersButton;
	private: System::Windows::Forms::Panel^  marker;
	private: System::Windows::Forms::Button^  usersButton;
	private: System::Windows::Forms::Button^  ordersButton;
	private: System::Windows::Forms::Button^  infoButton;
	private: System::ComponentModel::IContainer^  components;



	private:
		/// <summary>
		/// Wymagana zmienna projektanta.
		/// </summary>


#pragma region Windows Form Designer generated code
		/// <summary>
		/// Wymagana metoda obs³ugi projektanta — nie nale¿y modyfikowaæ 
		/// zawartoœæ tej metody z edytorem kodu.
		/// </summary>
		void InitializeComponent(void)
		{
			this->components = (gcnew System::ComponentModel::Container());
			System::ComponentModel::ComponentResourceManager^  resources = (gcnew System::ComponentModel::ComponentResourceManager(OwnerForm::typeid));
			this->panel1 = (gcnew System::Windows::Forms::Panel());
			this->showMoreButton = (gcnew System::Windows::Forms::Button());
			this->infoButton = (gcnew System::Windows::Forms::Button());
			this->ordersButton = (gcnew System::Windows::Forms::Button());
			this->usersButton = (gcnew System::Windows::Forms::Button());
			this->marker = (gcnew System::Windows::Forms::Panel());
			this->offersButton = (gcnew System::Windows::Forms::Button());
			this->pictureBox1 = (gcnew System::Windows::Forms::PictureBox());
			this->panel2 = (gcnew System::Windows::Forms::Panel());
			this->logoutButton = (gcnew System::Windows::Forms::Button());
			this->label1 = (gcnew System::Windows::Forms::Label());
			this->panel3 = (gcnew System::Windows::Forms::Panel());
			this->offersPanel = (gcnew System::Windows::Forms::Panel());
			this->welcomePic = (gcnew System::Windows::Forms::PictureBox());
			this->infoPanel = (gcnew System::Windows::Forms::Panel());
			this->label13 = (gcnew System::Windows::Forms::Label());
			this->label12 = (gcnew System::Windows::Forms::Label());
			this->label11 = (gcnew System::Windows::Forms::Label());
			this->label10 = (gcnew System::Windows::Forms::Label());
			this->label9 = (gcnew System::Windows::Forms::Label());
			this->usersPanel = (gcnew System::Windows::Forms::Panel());
			this->addOfferPanel = (gcnew System::Windows::Forms::Panel());
			this->textBox1 = (gcnew System::Windows::Forms::TextBox());
			this->createOfferButton = (gcnew System::Windows::Forms::Button());
			this->offerPriceTextBox = (gcnew System::Windows::Forms::TextBox());
			this->label4 = (gcnew System::Windows::Forms::Label());
			this->label3 = (gcnew System::Windows::Forms::Label());
			this->label2 = (gcnew System::Windows::Forms::Label());
			this->carsComboBox = (gcnew System::Windows::Forms::ComboBox());
			this->addCarPanel = (gcnew System::Windows::Forms::Panel());
			this->gearboxTypeComboBox = (gcnew System::Windows::Forms::ComboBox());
			this->fuelTypeComboBox = (gcnew System::Windows::Forms::ComboBox());
			this->addCar2Button = (gcnew System::Windows::Forms::Button());
			this->OnumberPlateTextBox = (gcnew System::Windows::Forms::TextBox());
			this->label18 = (gcnew System::Windows::Forms::Label());
			this->label17 = (gcnew System::Windows::Forms::Label());
			this->label16 = (gcnew System::Windows::Forms::Label());
			this->OpowerhorseTextBox = (gcnew System::Windows::Forms::TextBox());
			this->label15 = (gcnew System::Windows::Forms::Label());
			this->OcapacityTextBox = (gcnew System::Windows::Forms::TextBox());
			this->label14 = (gcnew System::Windows::Forms::Label());
			this->OmilleageTextBox = (gcnew System::Windows::Forms::TextBox());
			this->label8 = (gcnew System::Windows::Forms::Label());
			this->OproductionYearTextBox = (gcnew System::Windows::Forms::TextBox());
			this->label7 = (gcnew System::Windows::Forms::Label());
			this->OmodelTextBox = (gcnew System::Windows::Forms::TextBox());
			this->label6 = (gcnew System::Windows::Forms::Label());
			this->ObrandTextBox = (gcnew System::Windows::Forms::TextBox());
			this->label5 = (gcnew System::Windows::Forms::Label());
			this->editCarsPanel = (gcnew System::Windows::Forms::Panel());
			this->offerDetailsPanel = (gcnew System::Windows::Forms::Panel());
			this->goBackButton = (gcnew System::Windows::Forms::Button());
			this->deleteOfferDetailButton = (gcnew System::Windows::Forms::Button());
			this->label19 = (gcnew System::Windows::Forms::Label());
			this->offerDetailpriceTextBox = (gcnew System::Windows::Forms::TextBox());
			this->modelLbl = (gcnew System::Windows::Forms::Label());
			this->brandLbl = (gcnew System::Windows::Forms::Label());
			this->saveChangesOfferDetailButton = (gcnew System::Windows::Forms::Button());
			this->editOfferDetailsButton = (gcnew System::Windows::Forms::Button());
			this->editCarsPanel2 = (gcnew System::Windows::Forms::Panel());
			this->goToCarListButton = (gcnew System::Windows::Forms::Button());
			this->deleteCarButton = (gcnew System::Windows::Forms::Button());
			this->label28 = (gcnew System::Windows::Forms::Label());
			this->editCars2GearboxType = (gcnew System::Windows::Forms::ComboBox());
			this->editCars2FuelType = (gcnew System::Windows::Forms::ComboBox());
			this->editCars2NumberPlate = (gcnew System::Windows::Forms::TextBox());
			this->label20 = (gcnew System::Windows::Forms::Label());
			this->label21 = (gcnew System::Windows::Forms::Label());
			this->label22 = (gcnew System::Windows::Forms::Label());
			this->editCars2Powerhorse = (gcnew System::Windows::Forms::TextBox());
			this->editCars2Capacity = (gcnew System::Windows::Forms::TextBox());
			this->label23 = (gcnew System::Windows::Forms::Label());
			this->editCars2Milleage = (gcnew System::Windows::Forms::TextBox());
			this->label24 = (gcnew System::Windows::Forms::Label());
			this->editCars2productionYear = (gcnew System::Windows::Forms::TextBox());
			this->label25 = (gcnew System::Windows::Forms::Label());
			this->editCars2Model = (gcnew System::Windows::Forms::TextBox());
			this->label26 = (gcnew System::Windows::Forms::Label());
			this->editCars2Brand = (gcnew System::Windows::Forms::TextBox());
			this->label27 = (gcnew System::Windows::Forms::Label());
			this->editCars2SaveButton = (gcnew System::Windows::Forms::Button());
			this->editCars2EditButton = (gcnew System::Windows::Forms::Button());
			this->ordersPanel = (gcnew System::Windows::Forms::Panel());
			this->orderDetailsPanel = (gcnew System::Windows::Forms::Panel());
			this->remakeOfferButton = (gcnew System::Windows::Forms::Button());
			this->label46 = (gcnew System::Windows::Forms::Label());
			this->label45 = (gcnew System::Windows::Forms::Label());
			this->label44 = (gcnew System::Windows::Forms::Label());
			this->label43 = (gcnew System::Windows::Forms::Label());
			this->label42 = (gcnew System::Windows::Forms::Label());
			this->orderDetailsEmail = (gcnew System::Windows::Forms::Label());
			this->orderDetailsIdentityCard = (gcnew System::Windows::Forms::Label());
			this->orderDetailsPhoneNo = (gcnew System::Windows::Forms::Label());
			this->orderDetailsSurname = (gcnew System::Windows::Forms::Label());
			this->orderDetailsName = (gcnew System::Windows::Forms::Label());
			this->goBackButton2 = (gcnew System::Windows::Forms::Button());
			this->orderDetailsPriceStrikeout = (gcnew System::Windows::Forms::Label());
			this->grantedLbl = (gcnew System::Windows::Forms::Label());
			this->grantDiscountButton = (gcnew System::Windows::Forms::Button());
			this->orderDetailsDiscount = (gcnew System::Windows::Forms::Label());
			this->orderDetailsPrice = (gcnew System::Windows::Forms::Label());
			this->orderDetailsDayOfReturn = (gcnew System::Windows::Forms::Label());
			this->orderDetailsDayOfPurchase = (gcnew System::Windows::Forms::Label());
			this->label40 = (gcnew System::Windows::Forms::Label());
			this->label39 = (gcnew System::Windows::Forms::Label());
			this->label38 = (gcnew System::Windows::Forms::Label());
			this->label37 = (gcnew System::Windows::Forms::Label());
			this->orderDetailsNumberPlate = (gcnew System::Windows::Forms::Label());
			this->orderDetailsGearboxType = (gcnew System::Windows::Forms::Label());
			this->orderDetailsFuelType = (gcnew System::Windows::Forms::Label());
			this->orderDetailsPowerhorse = (gcnew System::Windows::Forms::Label());
			this->orderDetailsCapacity = (gcnew System::Windows::Forms::Label());
			this->orderDetailsMilleage = (gcnew System::Windows::Forms::Label());
			this->orderDetailsProduction = (gcnew System::Windows::Forms::Label());
			this->orderDetailsModel = (gcnew System::Windows::Forms::Label());
			this->orderDetailsBrand = (gcnew System::Windows::Forms::Label());
			this->label29 = (gcnew System::Windows::Forms::Label());
			this->label30 = (gcnew System::Windows::Forms::Label());
			this->label31 = (gcnew System::Windows::Forms::Label());
			this->label32 = (gcnew System::Windows::Forms::Label());
			this->label33 = (gcnew System::Windows::Forms::Label());
			this->label34 = (gcnew System::Windows::Forms::Label());
			this->label35 = (gcnew System::Windows::Forms::Label());
			this->label36 = (gcnew System::Windows::Forms::Label());
			this->label41 = (gcnew System::Windows::Forms::Label());
			this->slidePanel = (gcnew System::Windows::Forms::Panel());
			this->offersSlidePanel = (gcnew System::Windows::Forms::Panel());
			this->editCarsButton = (gcnew System::Windows::Forms::Button());
			this->addCarButton = (gcnew System::Windows::Forms::Button());
			this->addOfferButton = (gcnew System::Windows::Forms::Button());
			this->timer1 = (gcnew System::Windows::Forms::Timer(this->components));
			this->panel1->SuspendLayout();
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->pictureBox1))->BeginInit();
			this->panel2->SuspendLayout();
			this->panel3->SuspendLayout();
			this->offersPanel->SuspendLayout();
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->welcomePic))->BeginInit();
			this->infoPanel->SuspendLayout();
			this->addOfferPanel->SuspendLayout();
			this->addCarPanel->SuspendLayout();
			this->offerDetailsPanel->SuspendLayout();
			this->editCarsPanel2->SuspendLayout();
			this->orderDetailsPanel->SuspendLayout();
			this->slidePanel->SuspendLayout();
			this->offersSlidePanel->SuspendLayout();
			this->SuspendLayout();
			// 
			// panel1
			// 
			this->panel1->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(21)), static_cast<System::Int32>(static_cast<System::Byte>(101)),
				static_cast<System::Int32>(static_cast<System::Byte>(192)));
			this->panel1->Controls->Add(this->showMoreButton);
			this->panel1->Controls->Add(this->infoButton);
			this->panel1->Controls->Add(this->ordersButton);
			this->panel1->Controls->Add(this->usersButton);
			this->panel1->Controls->Add(this->marker);
			this->panel1->Controls->Add(this->offersButton);
			this->panel1->Controls->Add(this->pictureBox1);
			this->panel1->Dock = System::Windows::Forms::DockStyle::Left;
			this->panel1->Location = System::Drawing::Point(0, 0);
			this->panel1->Name = L"panel1";
			this->panel1->Size = System::Drawing::Size(242, 581);
			this->panel1->TabIndex = 0;
			// 
			// showMoreButton
			// 
			this->showMoreButton->FlatAppearance->BorderSize = 0;
			this->showMoreButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->showMoreButton->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"showMoreButton.Image")));
			this->showMoreButton->Location = System::Drawing::Point(202, 128);
			this->showMoreButton->Name = L"showMoreButton";
			this->showMoreButton->Size = System::Drawing::Size(34, 23);
			this->showMoreButton->TabIndex = 8;
			this->showMoreButton->UseVisualStyleBackColor = true;
			this->showMoreButton->Click += gcnew System::EventHandler(this, &OwnerForm::showMoreButton_Click);
			// 
			// infoButton
			// 
			this->infoButton->FlatAppearance->BorderSize = 0;
			this->infoButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->infoButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 14.25F, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->infoButton->ForeColor = System::Drawing::Color::White;
			this->infoButton->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"infoButton.Image")));
			this->infoButton->ImageAlign = System::Drawing::ContentAlignment::MiddleLeft;
			this->infoButton->Location = System::Drawing::Point(26, 466);
			this->infoButton->Name = L"infoButton";
			this->infoButton->Size = System::Drawing::Size(213, 79);
			this->infoButton->TabIndex = 7;
			this->infoButton->Text = L"Informacje";
			this->infoButton->TextAlign = System::Drawing::ContentAlignment::MiddleRight;
			this->infoButton->UseVisualStyleBackColor = true;
			this->infoButton->Click += gcnew System::EventHandler(this, &OwnerForm::infoButton_Click);
			// 
			// ordersButton
			// 
			this->ordersButton->FlatAppearance->BorderSize = 0;
			this->ordersButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->ordersButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 14.25F, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->ordersButton->ForeColor = System::Drawing::Color::White;
			this->ordersButton->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"ordersButton.Image")));
			this->ordersButton->ImageAlign = System::Drawing::ContentAlignment::MiddleLeft;
			this->ordersButton->Location = System::Drawing::Point(25, 344);
			this->ordersButton->Name = L"ordersButton";
			this->ordersButton->Size = System::Drawing::Size(216, 79);
			this->ordersButton->TabIndex = 6;
			this->ordersButton->Text = L"Zamówienia";
			this->ordersButton->TextAlign = System::Drawing::ContentAlignment::MiddleRight;
			this->ordersButton->UseVisualStyleBackColor = true;
			this->ordersButton->Click += gcnew System::EventHandler(this, &OwnerForm::ordersButton_Click);
			// 
			// usersButton
			// 
			this->usersButton->FlatAppearance->BorderSize = 0;
			this->usersButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->usersButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 14.25F, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->usersButton->ForeColor = System::Drawing::Color::White;
			this->usersButton->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"usersButton.Image")));
			this->usersButton->ImageAlign = System::Drawing::ContentAlignment::MiddleLeft;
			this->usersButton->Location = System::Drawing::Point(27, 218);
			this->usersButton->Name = L"usersButton";
			this->usersButton->Size = System::Drawing::Size(206, 79);
			this->usersButton->TabIndex = 5;
			this->usersButton->Text = L"U¿ytkownicy";
			this->usersButton->TextAlign = System::Drawing::ContentAlignment::MiddleRight;
			this->usersButton->UseVisualStyleBackColor = true;
			this->usersButton->Click += gcnew System::EventHandler(this, &OwnerForm::usersButton_Click);
			// 
			// marker
			// 
			this->marker->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)), static_cast<System::Int32>(static_cast<System::Byte>(87)),
				static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->marker->Location = System::Drawing::Point(3, 99);
			this->marker->Name = L"marker";
			this->marker->Size = System::Drawing::Size(14, 79);
			this->marker->TabIndex = 4;
			// 
			// offersButton
			// 
			this->offersButton->FlatAppearance->BorderSize = 0;
			this->offersButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->offersButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 14.25F, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->offersButton->ForeColor = System::Drawing::Color::White;
			this->offersButton->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"offersButton.Image")));
			this->offersButton->ImageAlign = System::Drawing::ContentAlignment::MiddleLeft;
			this->offersButton->Location = System::Drawing::Point(27, 99);
			this->offersButton->Name = L"offersButton";
			this->offersButton->Size = System::Drawing::Size(174, 79);
			this->offersButton->TabIndex = 2;
			this->offersButton->Text = L"Oferty";
			this->offersButton->TextAlign = System::Drawing::ContentAlignment::MiddleRight;
			this->offersButton->UseVisualStyleBackColor = true;
			this->offersButton->Click += gcnew System::EventHandler(this, &OwnerForm::offersButton_Click);
			// 
			// pictureBox1
			// 
			this->pictureBox1->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"pictureBox1.Image")));
			this->pictureBox1->Location = System::Drawing::Point(69, 3);
			this->pictureBox1->Name = L"pictureBox1";
			this->pictureBox1->Size = System::Drawing::Size(101, 73);
			this->pictureBox1->SizeMode = System::Windows::Forms::PictureBoxSizeMode::Zoom;
			this->pictureBox1->TabIndex = 1;
			this->pictureBox1->TabStop = false;
			// 
			// panel2
			// 
			this->panel2->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(0)), static_cast<System::Int32>(static_cast<System::Byte>(176)),
				static_cast<System::Int32>(static_cast<System::Byte>(255)));
			this->panel2->Controls->Add(this->logoutButton);
			this->panel2->Controls->Add(this->label1);
			this->panel2->Dock = System::Windows::Forms::DockStyle::Top;
			this->panel2->Location = System::Drawing::Point(242, 0);
			this->panel2->Name = L"panel2";
			this->panel2->Size = System::Drawing::Size(940, 70);
			this->panel2->TabIndex = 1;
			// 
			// logoutButton
			// 
			this->logoutButton->FlatAppearance->BorderSize = 0;
			this->logoutButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->logoutButton->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"logoutButton.Image")));
			this->logoutButton->Location = System::Drawing::Point(862, 4);
			this->logoutButton->Name = L"logoutButton";
			this->logoutButton->Size = System::Drawing::Size(75, 60);
			this->logoutButton->TabIndex = 2;
			this->logoutButton->UseVisualStyleBackColor = true;
			this->logoutButton->Click += gcnew System::EventHandler(this, &OwnerForm::logoutButton_Click);
			// 
			// label1
			// 
			this->label1->AutoSize = true;
			this->label1->Font = (gcnew System::Drawing::Font(L"Century Gothic", 20.25F, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->label1->Location = System::Drawing::Point(3, 19);
			this->label1->Name = L"label1";
			this->label1->Size = System::Drawing::Size(558, 33);
			this->label1->TabIndex = 1;
			this->label1->Text = L"Wypo¿yczalnia aut - panel administratora";
			// 
			// panel3
			// 
			this->panel3->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(21)), static_cast<System::Int32>(static_cast<System::Byte>(101)),
				static_cast<System::Int32>(static_cast<System::Byte>(192)));
			this->panel3->Controls->Add(this->offersPanel);
			this->panel3->Controls->Add(this->infoPanel);
			this->panel3->Controls->Add(this->usersPanel);
			this->panel3->Controls->Add(this->addOfferPanel);
			this->panel3->Controls->Add(this->addCarPanel);
			this->panel3->Controls->Add(this->editCarsPanel);
			this->panel3->Controls->Add(this->offerDetailsPanel);
			this->panel3->Controls->Add(this->editCarsPanel2);
			this->panel3->Controls->Add(this->ordersPanel);
			this->panel3->Controls->Add(this->orderDetailsPanel);
			this->panel3->Dock = System::Windows::Forms::DockStyle::Fill;
			this->panel3->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Regular, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->panel3->Location = System::Drawing::Point(242, 70);
			this->panel3->Name = L"panel3";
			this->panel3->Size = System::Drawing::Size(940, 511);
			this->panel3->TabIndex = 2;
			// 
			// offersPanel
			// 
			this->offersPanel->AutoScroll = true;
			this->offersPanel->Controls->Add(this->welcomePic);
			this->offersPanel->Dock = System::Windows::Forms::DockStyle::Fill;
			this->offersPanel->Location = System::Drawing::Point(0, 0);
			this->offersPanel->Name = L"offersPanel";
			this->offersPanel->Size = System::Drawing::Size(940, 511);
			this->offersPanel->TabIndex = 0;
			// 
			// welcomePic
			// 
			this->welcomePic->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"welcomePic.Image")));
			this->welcomePic->Location = System::Drawing::Point(397, 165);
			this->welcomePic->Name = L"welcomePic";
			this->welcomePic->Size = System::Drawing::Size(128, 128);
			this->welcomePic->SizeMode = System::Windows::Forms::PictureBoxSizeMode::AutoSize;
			this->welcomePic->TabIndex = 0;
			this->welcomePic->TabStop = false;
			// 
			// infoPanel
			// 
			this->infoPanel->Controls->Add(this->label13);
			this->infoPanel->Controls->Add(this->label12);
			this->infoPanel->Controls->Add(this->label11);
			this->infoPanel->Controls->Add(this->label10);
			this->infoPanel->Controls->Add(this->label9);
			this->infoPanel->Dock = System::Windows::Forms::DockStyle::Fill;
			this->infoPanel->Location = System::Drawing::Point(0, 0);
			this->infoPanel->Name = L"infoPanel";
			this->infoPanel->Size = System::Drawing::Size(940, 511);
			this->infoPanel->TabIndex = 7;
			// 
			// label13
			// 
			this->label13->AutoSize = true;
			this->label13->Font = (gcnew System::Drawing::Font(L"Century Gothic", 6.75F, System::Drawing::FontStyle::Regular, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label13->ForeColor = System::Drawing::Color::White;
			this->label13->Location = System::Drawing::Point(309, 363);
			this->label13->Name = L"label13";
			this->label13->Size = System::Drawing::Size(347, 143);
			this->label13->TabIndex = 10;
			this->label13->Text = resources->GetString(L"label13.Text");
			// 
			// label12
			// 
			this->label12->AutoSize = true;
			this->label12->Font = (gcnew System::Drawing::Font(L"Century Gothic", 24, System::Drawing::FontStyle::Italic, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label12->ForeColor = System::Drawing::Color::White;
			this->label12->Location = System::Drawing::Point(256, 194);
			this->label12->Name = L"label12";
			this->label12->Size = System::Drawing::Size(422, 38);
			this->label12->TabIndex = 9;
			this->label12->Text = L"wiktor.pieklik@icloud.com";
			// 
			// label11
			// 
			this->label11->AutoSize = true;
			this->label11->Font = (gcnew System::Drawing::Font(L"Century Gothic", 15.75F, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->label11->ForeColor = System::Drawing::Color::White;
			this->label11->Location = System::Drawing::Point(433, 334);
			this->label11->Name = L"label11";
			this->label11->Size = System::Drawing::Size(79, 25);
			this->label11->TabIndex = 8;
			this->label11->Text = L"Grafiki";
			// 
			// label10
			// 
			this->label10->AutoSize = true;
			this->label10->Font = (gcnew System::Drawing::Font(L"Century Gothic", 26.25F, System::Drawing::FontStyle::Italic, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label10->ForeColor = System::Drawing::Color::White;
			this->label10->Location = System::Drawing::Point(349, 148);
			this->label10->Name = L"label10";
			this->label10->Size = System::Drawing::Size(239, 42);
			this->label10->TabIndex = 7;
			this->label10->Text = L"Wiktor Pieklik";
			// 
			// label9
			// 
			this->label9->AutoSize = true;
			this->label9->Font = (gcnew System::Drawing::Font(L"Century Gothic", 36, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->label9->ForeColor = System::Drawing::Color::White;
			this->label9->Location = System::Drawing::Point(399, 59);
			this->label9->Name = L"label9";
			this->label9->Size = System::Drawing::Size(150, 58);
			this->label9->TabIndex = 6;
			this->label9->Text = L"Autor";
			// 
			// usersPanel
			// 
			this->usersPanel->AutoScroll = true;
			this->usersPanel->Dock = System::Windows::Forms::DockStyle::Fill;
			this->usersPanel->Location = System::Drawing::Point(0, 0);
			this->usersPanel->Name = L"usersPanel";
			this->usersPanel->Size = System::Drawing::Size(940, 511);
			this->usersPanel->TabIndex = 7;
			// 
			// addOfferPanel
			// 
			this->addOfferPanel->Controls->Add(this->textBox1);
			this->addOfferPanel->Controls->Add(this->createOfferButton);
			this->addOfferPanel->Controls->Add(this->offerPriceTextBox);
			this->addOfferPanel->Controls->Add(this->label4);
			this->addOfferPanel->Controls->Add(this->label3);
			this->addOfferPanel->Controls->Add(this->label2);
			this->addOfferPanel->Controls->Add(this->carsComboBox);
			this->addOfferPanel->Dock = System::Windows::Forms::DockStyle::Fill;
			this->addOfferPanel->Location = System::Drawing::Point(0, 0);
			this->addOfferPanel->Name = L"addOfferPanel";
			this->addOfferPanel->Size = System::Drawing::Size(940, 511);
			this->addOfferPanel->TabIndex = 7;
			// 
			// textBox1
			// 
			this->textBox1->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->textBox1->Location = System::Drawing::Point(774, 193);
			this->textBox1->Name = L"textBox1";
			this->textBox1->Size = System::Drawing::Size(114, 20);
			this->textBox1->TabIndex = 7;
			// 
			// createOfferButton
			// 
			this->createOfferButton->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)),
				static_cast<System::Int32>(static_cast<System::Byte>(87)), static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->createOfferButton->Location = System::Drawing::Point(62, 274);
			this->createOfferButton->Name = L"createOfferButton";
			this->createOfferButton->Size = System::Drawing::Size(826, 30);
			this->createOfferButton->TabIndex = 6;
			this->createOfferButton->Text = L"Stwórz ofertê";
			this->createOfferButton->UseVisualStyleBackColor = false;
			this->createOfferButton->Click += gcnew System::EventHandler(this, &OwnerForm::addOffer);
			// 
			// offerPriceTextBox
			// 
			this->offerPriceTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->offerPriceTextBox->Location = System::Drawing::Point(444, 194);
			this->offerPriceTextBox->MaxLength = 10;
			this->offerPriceTextBox->Name = L"offerPriceTextBox";
			this->offerPriceTextBox->Size = System::Drawing::Size(117, 20);
			this->offerPriceTextBox->TabIndex = 4;
			// 
			// label4
			// 
			this->label4->AutoSize = true;
			this->label4->ForeColor = System::Drawing::Color::White;
			this->label4->Location = System::Drawing::Point(788, 154);
			this->label4->Name = L"label4";
			this->label4->Size = System::Drawing::Size(86, 21);
			this->label4->TabIndex = 3;
			this->label4->Text = L"Krótki opis";
			// 
			// label3
			// 
			this->label3->AutoSize = true;
			this->label3->ForeColor = System::Drawing::Color::White;
			this->label3->Location = System::Drawing::Point(418, 155);
			this->label3->Name = L"label3";
			this->label3->Size = System::Drawing::Size(170, 21);
			this->label3->TabIndex = 2;
			this->label3->Text = L"Cena oferty za dzieñ";
			// 
			// label2
			// 
			this->label2->AutoSize = true;
			this->label2->ForeColor = System::Drawing::Color::White;
			this->label2->Location = System::Drawing::Point(76, 152);
			this->label2->Name = L"label2";
			this->label2->Size = System::Drawing::Size(129, 21);
			this->label2->TabIndex = 1;
			this->label2->Text = L"Dostêpne auta";
			// 
			// carsComboBox
			// 
			this->carsComboBox->BackColor = System::Drawing::SystemColors::Control;
			this->carsComboBox->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->carsComboBox->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->carsComboBox->ForeColor = System::Drawing::Color::Black;
			this->carsComboBox->FormattingEnabled = true;
			this->carsComboBox->Location = System::Drawing::Point(60, 180);
			this->carsComboBox->Name = L"carsComboBox";
			this->carsComboBox->Size = System::Drawing::Size(157, 27);
			this->carsComboBox->TabIndex = 0;
			// 
			// addCarPanel
			// 
			this->addCarPanel->Controls->Add(this->gearboxTypeComboBox);
			this->addCarPanel->Controls->Add(this->fuelTypeComboBox);
			this->addCarPanel->Controls->Add(this->addCar2Button);
			this->addCarPanel->Controls->Add(this->OnumberPlateTextBox);
			this->addCarPanel->Controls->Add(this->label18);
			this->addCarPanel->Controls->Add(this->label17);
			this->addCarPanel->Controls->Add(this->label16);
			this->addCarPanel->Controls->Add(this->OpowerhorseTextBox);
			this->addCarPanel->Controls->Add(this->label15);
			this->addCarPanel->Controls->Add(this->OcapacityTextBox);
			this->addCarPanel->Controls->Add(this->label14);
			this->addCarPanel->Controls->Add(this->OmilleageTextBox);
			this->addCarPanel->Controls->Add(this->label8);
			this->addCarPanel->Controls->Add(this->OproductionYearTextBox);
			this->addCarPanel->Controls->Add(this->label7);
			this->addCarPanel->Controls->Add(this->OmodelTextBox);
			this->addCarPanel->Controls->Add(this->label6);
			this->addCarPanel->Controls->Add(this->ObrandTextBox);
			this->addCarPanel->Controls->Add(this->label5);
			this->addCarPanel->Dock = System::Windows::Forms::DockStyle::Fill;
			this->addCarPanel->Location = System::Drawing::Point(0, 0);
			this->addCarPanel->Name = L"addCarPanel";
			this->addCarPanel->Size = System::Drawing::Size(940, 511);
			this->addCarPanel->TabIndex = 1;
			// 
			// gearboxTypeComboBox
			// 
			this->gearboxTypeComboBox->AutoCompleteMode = System::Windows::Forms::AutoCompleteMode::Append;
			this->gearboxTypeComboBox->AutoCompleteSource = System::Windows::Forms::AutoCompleteSource::ListItems;
			this->gearboxTypeComboBox->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->gearboxTypeComboBox->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->gearboxTypeComboBox->FormattingEnabled = true;
			this->gearboxTypeComboBox->Items->AddRange(gcnew cli::array< System::Object^  >(2) { L"manualna", L"automatyczna" });
			this->gearboxTypeComboBox->Location = System::Drawing::Point(234, 363);
			this->gearboxTypeComboBox->Name = L"gearboxTypeComboBox";
			this->gearboxTypeComboBox->Size = System::Drawing::Size(223, 27);
			this->gearboxTypeComboBox->TabIndex = 20;
			// 
			// fuelTypeComboBox
			// 
			this->fuelTypeComboBox->AutoCompleteMode = System::Windows::Forms::AutoCompleteMode::Append;
			this->fuelTypeComboBox->AutoCompleteSource = System::Windows::Forms::AutoCompleteSource::ListItems;
			this->fuelTypeComboBox->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->fuelTypeComboBox->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->fuelTypeComboBox->FormattingEnabled = true;
			this->fuelTypeComboBox->Items->AddRange(gcnew cli::array< System::Object^  >(4) {
				L"benzyna 95", L"benzyna 98", L"diesel",
					L"LPG"
			});
			this->fuelTypeComboBox->Location = System::Drawing::Point(234, 314);
			this->fuelTypeComboBox->Name = L"fuelTypeComboBox";
			this->fuelTypeComboBox->Size = System::Drawing::Size(223, 27);
			this->fuelTypeComboBox->TabIndex = 19;
			// 
			// addCar2Button
			// 
			this->addCar2Button->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)), static_cast<System::Int32>(static_cast<System::Byte>(87)),
				static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->addCar2Button->FlatAppearance->BorderSize = 0;
			this->addCar2Button->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->addCar2Button->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->addCar2Button->ForeColor = System::Drawing::Color::White;
			this->addCar2Button->Location = System::Drawing::Point(632, 194);
			this->addCar2Button->Name = L"addCar2Button";
			this->addCar2Button->Size = System::Drawing::Size(136, 78);
			this->addCar2Button->TabIndex = 18;
			this->addCar2Button->Text = L"Dodaj";
			this->addCar2Button->UseVisualStyleBackColor = false;
			this->addCar2Button->Click += gcnew System::EventHandler(this, &OwnerForm::addCar2Button_Click);
			// 
			// OnumberPlateTextBox
			// 
			this->OnumberPlateTextBox->BackColor = System::Drawing::SystemColors::Control;
			this->OnumberPlateTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->OnumberPlateTextBox->Location = System::Drawing::Point(234, 411);
			this->OnumberPlateTextBox->MaxLength = 45;
			this->OnumberPlateTextBox->Name = L"OnumberPlateTextBox";
			this->OnumberPlateTextBox->Size = System::Drawing::Size(223, 20);
			this->OnumberPlateTextBox->TabIndex = 17;
			// 
			// label18
			// 
			this->label18->AutoSize = true;
			this->label18->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label18->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label18->ForeColor = System::Drawing::Color::White;
			this->label18->Location = System::Drawing::Point(42, 412);
			this->label18->Name = L"label18";
			this->label18->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label18->Size = System::Drawing::Size(127, 19);
			this->label18->TabIndex = 16;
			this->label18->Text = L"Nr rejestracyjny";
			// 
			// label17
			// 
			this->label17->AutoSize = true;
			this->label17->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label17->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label17->ForeColor = System::Drawing::Color::White;
			this->label17->Location = System::Drawing::Point(42, 365);
			this->label17->Name = L"label17";
			this->label17->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label17->Size = System::Drawing::Size(90, 19);
			this->label17->TabIndex = 14;
			this->label17->Text = L"Typ skrzyni";
			// 
			// label16
			// 
			this->label16->AutoSize = true;
			this->label16->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label16->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label16->ForeColor = System::Drawing::Color::White;
			this->label16->Location = System::Drawing::Point(42, 318);
			this->label16->Name = L"label16";
			this->label16->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label16->Size = System::Drawing::Size(94, 19);
			this->label16->TabIndex = 12;
			this->label16->Text = L"Typ paliwa";
			// 
			// OpowerhorseTextBox
			// 
			this->OpowerhorseTextBox->BackColor = System::Drawing::SystemColors::Control;
			this->OpowerhorseTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->OpowerhorseTextBox->Location = System::Drawing::Point(234, 270);
			this->OpowerhorseTextBox->MaxLength = 10;
			this->OpowerhorseTextBox->Name = L"OpowerhorseTextBox";
			this->OpowerhorseTextBox->Size = System::Drawing::Size(223, 20);
			this->OpowerhorseTextBox->TabIndex = 11;
			// 
			// label15
			// 
			this->label15->AutoSize = true;
			this->label15->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label15->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label15->ForeColor = System::Drawing::Color::White;
			this->label15->Location = System::Drawing::Point(42, 271);
			this->label15->Name = L"label15";
			this->label15->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label15->Size = System::Drawing::Size(33, 19);
			this->label15->TabIndex = 10;
			this->label15->Text = L"KM";
			// 
			// OcapacityTextBox
			// 
			this->OcapacityTextBox->BackColor = System::Drawing::SystemColors::Control;
			this->OcapacityTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->OcapacityTextBox->Location = System::Drawing::Point(234, 223);
			this->OcapacityTextBox->MaxLength = 45;
			this->OcapacityTextBox->Name = L"OcapacityTextBox";
			this->OcapacityTextBox->Size = System::Drawing::Size(223, 20);
			this->OcapacityTextBox->TabIndex = 9;
			// 
			// label14
			// 
			this->label14->AutoSize = true;
			this->label14->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label14->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label14->ForeColor = System::Drawing::Color::White;
			this->label14->Location = System::Drawing::Point(42, 224);
			this->label14->Name = L"label14";
			this->label14->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label14->Size = System::Drawing::Size(175, 19);
			this->label14->TabIndex = 8;
			this->label14->Text = L"Pojemnoœæ (w litrach)";
			// 
			// OmilleageTextBox
			// 
			this->OmilleageTextBox->BackColor = System::Drawing::SystemColors::Control;
			this->OmilleageTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->OmilleageTextBox->Location = System::Drawing::Point(234, 176);
			this->OmilleageTextBox->MaxLength = 45;
			this->OmilleageTextBox->Name = L"OmilleageTextBox";
			this->OmilleageTextBox->Size = System::Drawing::Size(223, 20);
			this->OmilleageTextBox->TabIndex = 7;
			// 
			// label8
			// 
			this->label8->AutoSize = true;
			this->label8->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label8->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label8->ForeColor = System::Drawing::Color::White;
			this->label8->Location = System::Drawing::Point(42, 177);
			this->label8->Name = L"label8";
			this->label8->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label8->Size = System::Drawing::Size(117, 19);
			this->label8->TabIndex = 6;
			this->label8->Text = L"Przebieg (km)";
			// 
			// OproductionYearTextBox
			// 
			this->OproductionYearTextBox->BackColor = System::Drawing::SystemColors::Control;
			this->OproductionYearTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->OproductionYearTextBox->Location = System::Drawing::Point(234, 129);
			this->OproductionYearTextBox->MaxLength = 10;
			this->OproductionYearTextBox->Name = L"OproductionYearTextBox";
			this->OproductionYearTextBox->Size = System::Drawing::Size(223, 20);
			this->OproductionYearTextBox->TabIndex = 5;
			// 
			// label7
			// 
			this->label7->AutoSize = true;
			this->label7->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label7->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label7->ForeColor = System::Drawing::Color::White;
			this->label7->Location = System::Drawing::Point(42, 130);
			this->label7->Name = L"label7";
			this->label7->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label7->Size = System::Drawing::Size(115, 19);
			this->label7->TabIndex = 4;
			this->label7->Text = L"Rok produkcji";
			// 
			// OmodelTextBox
			// 
			this->OmodelTextBox->BackColor = System::Drawing::SystemColors::Control;
			this->OmodelTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->OmodelTextBox->Location = System::Drawing::Point(234, 82);
			this->OmodelTextBox->MaxLength = 45;
			this->OmodelTextBox->Name = L"OmodelTextBox";
			this->OmodelTextBox->Size = System::Drawing::Size(223, 20);
			this->OmodelTextBox->TabIndex = 3;
			// 
			// label6
			// 
			this->label6->AutoSize = true;
			this->label6->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label6->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label6->ForeColor = System::Drawing::Color::White;
			this->label6->Location = System::Drawing::Point(42, 83);
			this->label6->Name = L"label6";
			this->label6->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label6->Size = System::Drawing::Size(58, 19);
			this->label6->TabIndex = 2;
			this->label6->Text = L"Model";
			// 
			// ObrandTextBox
			// 
			this->ObrandTextBox->BackColor = System::Drawing::SystemColors::Control;
			this->ObrandTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->ObrandTextBox->Location = System::Drawing::Point(234, 35);
			this->ObrandTextBox->MaxLength = 45;
			this->ObrandTextBox->Name = L"ObrandTextBox";
			this->ObrandTextBox->Size = System::Drawing::Size(223, 20);
			this->ObrandTextBox->TabIndex = 1;
			// 
			// label5
			// 
			this->label5->AutoSize = true;
			this->label5->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label5->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label5->ForeColor = System::Drawing::Color::White;
			this->label5->Location = System::Drawing::Point(42, 36);
			this->label5->Name = L"label5";
			this->label5->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label5->Size = System::Drawing::Size(59, 19);
			this->label5->TabIndex = 0;
			this->label5->Text = L"Marka";
			// 
			// editCarsPanel
			// 
			this->editCarsPanel->AutoScroll = true;
			this->editCarsPanel->Dock = System::Windows::Forms::DockStyle::Fill;
			this->editCarsPanel->Location = System::Drawing::Point(0, 0);
			this->editCarsPanel->Name = L"editCarsPanel";
			this->editCarsPanel->Size = System::Drawing::Size(940, 511);
			this->editCarsPanel->TabIndex = 1;
			// 
			// offerDetailsPanel
			// 
			this->offerDetailsPanel->Controls->Add(this->goBackButton);
			this->offerDetailsPanel->Controls->Add(this->deleteOfferDetailButton);
			this->offerDetailsPanel->Controls->Add(this->label19);
			this->offerDetailsPanel->Controls->Add(this->offerDetailpriceTextBox);
			this->offerDetailsPanel->Controls->Add(this->modelLbl);
			this->offerDetailsPanel->Controls->Add(this->brandLbl);
			this->offerDetailsPanel->Controls->Add(this->saveChangesOfferDetailButton);
			this->offerDetailsPanel->Controls->Add(this->editOfferDetailsButton);
			this->offerDetailsPanel->Dock = System::Windows::Forms::DockStyle::Fill;
			this->offerDetailsPanel->Location = System::Drawing::Point(0, 0);
			this->offerDetailsPanel->Name = L"offerDetailsPanel";
			this->offerDetailsPanel->Size = System::Drawing::Size(940, 511);
			this->offerDetailsPanel->TabIndex = 1;
			// 
			// goBackButton
			// 
			this->goBackButton->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(21)), static_cast<System::Int32>(static_cast<System::Byte>(101)),
				static_cast<System::Int32>(static_cast<System::Byte>(192)));
			this->goBackButton->FlatAppearance->BorderSize = 0;
			this->goBackButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->goBackButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->goBackButton->ForeColor = System::Drawing::Color::White;
			this->goBackButton->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"goBackButton.Image")));
			this->goBackButton->ImageAlign = System::Drawing::ContentAlignment::MiddleLeft;
			this->goBackButton->Location = System::Drawing::Point(6, 9);
			this->goBackButton->Name = L"goBackButton";
			this->goBackButton->Size = System::Drawing::Size(76, 52);
			this->goBackButton->TabIndex = 7;
			this->goBackButton->TextAlign = System::Drawing::ContentAlignment::MiddleRight;
			this->goBackButton->UseVisualStyleBackColor = false;
			this->goBackButton->Click += gcnew System::EventHandler(this, &OwnerForm::goBackButton_Click);
			// 
			// deleteOfferDetailButton
			// 
			this->deleteOfferDetailButton->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)),
				static_cast<System::Int32>(static_cast<System::Byte>(87)), static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->deleteOfferDetailButton->FlatAppearance->BorderSize = 0;
			this->deleteOfferDetailButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->deleteOfferDetailButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->deleteOfferDetailButton->ForeColor = System::Drawing::Color::White;
			this->deleteOfferDetailButton->Location = System::Drawing::Point(843, 22);
			this->deleteOfferDetailButton->Name = L"deleteOfferDetailButton";
			this->deleteOfferDetailButton->Size = System::Drawing::Size(75, 27);
			this->deleteOfferDetailButton->TabIndex = 5;
			this->deleteOfferDetailButton->Text = L"Usuñ";
			this->deleteOfferDetailButton->UseVisualStyleBackColor = false;
			this->deleteOfferDetailButton->Click += gcnew System::EventHandler(this, &OwnerForm::deleteOfferDetailButton_Click);
			// 
			// label19
			// 
			this->label19->AutoSize = true;
			this->label19->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label19->Font = (gcnew System::Drawing::Font(L"Century Gothic", 14.25F, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label19->ForeColor = System::Drawing::Color::White;
			this->label19->Location = System::Drawing::Point(309, 210);
			this->label19->Name = L"label19";
			this->label19->Size = System::Drawing::Size(148, 23);
			this->label19->TabIndex = 3;
			this->label19->Text = L"Cena za dzieñ:";
			// 
			// offerDetailpriceTextBox
			// 
			this->offerDetailpriceTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->offerDetailpriceTextBox->Enabled = false;
			this->offerDetailpriceTextBox->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->offerDetailpriceTextBox->Location = System::Drawing::Point(476, 211);
			this->offerDetailpriceTextBox->Name = L"offerDetailpriceTextBox";
			this->offerDetailpriceTextBox->Size = System::Drawing::Size(100, 20);
			this->offerDetailpriceTextBox->TabIndex = 2;
			// 
			// modelLbl
			// 
			this->modelLbl->AutoSize = true;
			this->modelLbl->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->modelLbl->Font = (gcnew System::Drawing::Font(L"Century Gothic", 18, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->modelLbl->ForeColor = System::Drawing::Color::White;
			this->modelLbl->Location = System::Drawing::Point(490, 148);
			this->modelLbl->Name = L"modelLbl";
			this->modelLbl->Size = System::Drawing::Size(98, 30);
			this->modelLbl->TabIndex = 1;
			this->modelLbl->Text = L"label19";
			// 
			// brandLbl
			// 
			this->brandLbl->AutoSize = true;
			this->brandLbl->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->brandLbl->Font = (gcnew System::Drawing::Font(L"Century Gothic", 18, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->brandLbl->ForeColor = System::Drawing::Color::White;
			this->brandLbl->Location = System::Drawing::Point(333, 148);
			this->brandLbl->Name = L"brandLbl";
			this->brandLbl->Size = System::Drawing::Size(98, 30);
			this->brandLbl->TabIndex = 0;
			this->brandLbl->Text = L"label19";
			// 
			// saveChangesOfferDetailButton
			// 
			this->saveChangesOfferDetailButton->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)),
				static_cast<System::Int32>(static_cast<System::Byte>(87)), static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->saveChangesOfferDetailButton->FlatAppearance->BorderSize = 0;
			this->saveChangesOfferDetailButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->saveChangesOfferDetailButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold,
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->saveChangesOfferDetailButton->ForeColor = System::Drawing::Color::White;
			this->saveChangesOfferDetailButton->Location = System::Drawing::Point(350, 281);
			this->saveChangesOfferDetailButton->Name = L"saveChangesOfferDetailButton";
			this->saveChangesOfferDetailButton->Size = System::Drawing::Size(230, 27);
			this->saveChangesOfferDetailButton->TabIndex = 6;
			this->saveChangesOfferDetailButton->Text = L"Zapisz";
			this->saveChangesOfferDetailButton->UseVisualStyleBackColor = false;
			this->saveChangesOfferDetailButton->Visible = false;
			this->saveChangesOfferDetailButton->Click += gcnew System::EventHandler(this, &OwnerForm::saveChangesOfferDetailButton_Click);
			// 
			// editOfferDetailsButton
			// 
			this->editOfferDetailsButton->BackColor = System::Drawing::SystemColors::Control;
			this->editOfferDetailsButton->FlatAppearance->BorderSize = 0;
			this->editOfferDetailsButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->editOfferDetailsButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->editOfferDetailsButton->ForeColor = System::Drawing::Color::Black;
			this->editOfferDetailsButton->Location = System::Drawing::Point(419, 281);
			this->editOfferDetailsButton->Name = L"editOfferDetailsButton";
			this->editOfferDetailsButton->Size = System::Drawing::Size(75, 27);
			this->editOfferDetailsButton->TabIndex = 4;
			this->editOfferDetailsButton->Text = L"Edytuj";
			this->editOfferDetailsButton->UseVisualStyleBackColor = false;
			this->editOfferDetailsButton->Click += gcnew System::EventHandler(this, &OwnerForm::editOfferDetailsButton_Click);
			// 
			// editCarsPanel2
			// 
			this->editCarsPanel2->Controls->Add(this->goToCarListButton);
			this->editCarsPanel2->Controls->Add(this->deleteCarButton);
			this->editCarsPanel2->Controls->Add(this->label28);
			this->editCarsPanel2->Controls->Add(this->editCars2GearboxType);
			this->editCarsPanel2->Controls->Add(this->editCars2FuelType);
			this->editCarsPanel2->Controls->Add(this->editCars2NumberPlate);
			this->editCarsPanel2->Controls->Add(this->label20);
			this->editCarsPanel2->Controls->Add(this->label21);
			this->editCarsPanel2->Controls->Add(this->label22);
			this->editCarsPanel2->Controls->Add(this->editCars2Powerhorse);
			this->editCarsPanel2->Controls->Add(this->editCars2Capacity);
			this->editCarsPanel2->Controls->Add(this->label23);
			this->editCarsPanel2->Controls->Add(this->editCars2Milleage);
			this->editCarsPanel2->Controls->Add(this->label24);
			this->editCarsPanel2->Controls->Add(this->editCars2productionYear);
			this->editCarsPanel2->Controls->Add(this->label25);
			this->editCarsPanel2->Controls->Add(this->editCars2Model);
			this->editCarsPanel2->Controls->Add(this->label26);
			this->editCarsPanel2->Controls->Add(this->editCars2Brand);
			this->editCarsPanel2->Controls->Add(this->label27);
			this->editCarsPanel2->Controls->Add(this->editCars2SaveButton);
			this->editCarsPanel2->Controls->Add(this->editCars2EditButton);
			this->editCarsPanel2->Dock = System::Windows::Forms::DockStyle::Fill;
			this->editCarsPanel2->Location = System::Drawing::Point(0, 0);
			this->editCarsPanel2->Name = L"editCarsPanel2";
			this->editCarsPanel2->Size = System::Drawing::Size(940, 511);
			this->editCarsPanel2->TabIndex = 1;
			// 
			// goToCarListButton
			// 
			this->goToCarListButton->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(21)),
				static_cast<System::Int32>(static_cast<System::Byte>(101)), static_cast<System::Int32>(static_cast<System::Byte>(192)));
			this->goToCarListButton->FlatAppearance->BorderSize = 0;
			this->goToCarListButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->goToCarListButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->goToCarListButton->ForeColor = System::Drawing::Color::White;
			this->goToCarListButton->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"goToCarListButton.Image")));
			this->goToCarListButton->ImageAlign = System::Drawing::ContentAlignment::MiddleLeft;
			this->goToCarListButton->Location = System::Drawing::Point(9, 9);
			this->goToCarListButton->Name = L"goToCarListButton";
			this->goToCarListButton->Size = System::Drawing::Size(76, 52);
			this->goToCarListButton->TabIndex = 40;
			this->goToCarListButton->TextAlign = System::Drawing::ContentAlignment::MiddleRight;
			this->goToCarListButton->UseVisualStyleBackColor = false;
			this->goToCarListButton->Click += gcnew System::EventHandler(this, &OwnerForm::goToCarListButton_Click);
			// 
			// deleteCarButton
			// 
			this->deleteCarButton->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)), static_cast<System::Int32>(static_cast<System::Byte>(87)),
				static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->deleteCarButton->FlatAppearance->BorderSize = 0;
			this->deleteCarButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->deleteCarButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->deleteCarButton->ForeColor = System::Drawing::Color::White;
			this->deleteCarButton->Location = System::Drawing::Point(853, 9);
			this->deleteCarButton->Name = L"deleteCarButton";
			this->deleteCarButton->Size = System::Drawing::Size(75, 27);
			this->deleteCarButton->TabIndex = 39;
			this->deleteCarButton->Text = L"Usuñ";
			this->deleteCarButton->UseVisualStyleBackColor = false;
			this->deleteCarButton->Click += gcnew System::EventHandler(this, &OwnerForm::deleteCarButton_Click);
			// 
			// label28
			// 
			this->label28->AutoSize = true;
			this->label28->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label28->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label28->ForeColor = System::Drawing::Color::White;
			this->label28->Location = System::Drawing::Point(256, 257);
			this->label28->Name = L"label28";
			this->label28->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label28->Size = System::Drawing::Size(33, 19);
			this->label28->TabIndex = 38;
			this->label28->Text = L"KM";
			// 
			// editCars2GearboxType
			// 
			this->editCars2GearboxType->AutoCompleteMode = System::Windows::Forms::AutoCompleteMode::Append;
			this->editCars2GearboxType->AutoCompleteSource = System::Windows::Forms::AutoCompleteSource::ListItems;
			this->editCars2GearboxType->Enabled = false;
			this->editCars2GearboxType->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->editCars2GearboxType->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->editCars2GearboxType->FormattingEnabled = true;
			this->editCars2GearboxType->Items->AddRange(gcnew cli::array< System::Object^  >(2) { L"manualna", L"automatyczna" });
			this->editCars2GearboxType->Location = System::Drawing::Point(448, 349);
			this->editCars2GearboxType->Name = L"editCars2GearboxType";
			this->editCars2GearboxType->Size = System::Drawing::Size(223, 27);
			this->editCars2GearboxType->TabIndex = 37;
			// 
			// editCars2FuelType
			// 
			this->editCars2FuelType->AutoCompleteMode = System::Windows::Forms::AutoCompleteMode::Append;
			this->editCars2FuelType->AutoCompleteSource = System::Windows::Forms::AutoCompleteSource::ListItems;
			this->editCars2FuelType->Enabled = false;
			this->editCars2FuelType->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->editCars2FuelType->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->editCars2FuelType->FormattingEnabled = true;
			this->editCars2FuelType->Items->AddRange(gcnew cli::array< System::Object^  >(4) {
				L"benzyna 95", L"benzyna 98", L"diesel",
					L"LPG"
			});
			this->editCars2FuelType->Location = System::Drawing::Point(448, 300);
			this->editCars2FuelType->Name = L"editCars2FuelType";
			this->editCars2FuelType->Size = System::Drawing::Size(223, 27);
			this->editCars2FuelType->TabIndex = 36;
			// 
			// editCars2NumberPlate
			// 
			this->editCars2NumberPlate->BackColor = System::Drawing::SystemColors::Control;
			this->editCars2NumberPlate->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->editCars2NumberPlate->Enabled = false;
			this->editCars2NumberPlate->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->editCars2NumberPlate->Location = System::Drawing::Point(448, 397);
			this->editCars2NumberPlate->MaxLength = 45;
			this->editCars2NumberPlate->Name = L"editCars2NumberPlate";
			this->editCars2NumberPlate->Size = System::Drawing::Size(223, 20);
			this->editCars2NumberPlate->TabIndex = 35;
			// 
			// label20
			// 
			this->label20->AutoSize = true;
			this->label20->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label20->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label20->ForeColor = System::Drawing::Color::White;
			this->label20->Location = System::Drawing::Point(256, 398);
			this->label20->Name = L"label20";
			this->label20->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label20->Size = System::Drawing::Size(127, 19);
			this->label20->TabIndex = 34;
			this->label20->Text = L"Nr rejestracyjny";
			// 
			// label21
			// 
			this->label21->AutoSize = true;
			this->label21->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label21->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label21->ForeColor = System::Drawing::Color::White;
			this->label21->Location = System::Drawing::Point(256, 351);
			this->label21->Name = L"label21";
			this->label21->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label21->Size = System::Drawing::Size(90, 19);
			this->label21->TabIndex = 33;
			this->label21->Text = L"Typ skrzyni";
			// 
			// label22
			// 
			this->label22->AutoSize = true;
			this->label22->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label22->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label22->ForeColor = System::Drawing::Color::White;
			this->label22->Location = System::Drawing::Point(256, 304);
			this->label22->Name = L"label22";
			this->label22->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label22->Size = System::Drawing::Size(94, 19);
			this->label22->TabIndex = 32;
			this->label22->Text = L"Typ paliwa";
			// 
			// editCars2Powerhorse
			// 
			this->editCars2Powerhorse->BackColor = System::Drawing::SystemColors::Control;
			this->editCars2Powerhorse->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->editCars2Powerhorse->Enabled = false;
			this->editCars2Powerhorse->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->editCars2Powerhorse->Location = System::Drawing::Point(448, 256);
			this->editCars2Powerhorse->MaxLength = 10;
			this->editCars2Powerhorse->Name = L"editCars2Powerhorse";
			this->editCars2Powerhorse->Size = System::Drawing::Size(223, 20);
			this->editCars2Powerhorse->TabIndex = 31;
			// 
			// editCars2Capacity
			// 
			this->editCars2Capacity->BackColor = System::Drawing::SystemColors::Control;
			this->editCars2Capacity->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->editCars2Capacity->Enabled = false;
			this->editCars2Capacity->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->editCars2Capacity->Location = System::Drawing::Point(448, 209);
			this->editCars2Capacity->MaxLength = 45;
			this->editCars2Capacity->Name = L"editCars2Capacity";
			this->editCars2Capacity->Size = System::Drawing::Size(223, 20);
			this->editCars2Capacity->TabIndex = 30;
			// 
			// label23
			// 
			this->label23->AutoSize = true;
			this->label23->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label23->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label23->ForeColor = System::Drawing::Color::White;
			this->label23->Location = System::Drawing::Point(256, 210);
			this->label23->Name = L"label23";
			this->label23->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label23->Size = System::Drawing::Size(175, 19);
			this->label23->TabIndex = 29;
			this->label23->Text = L"Pojemnoœæ (w litrach)";
			// 
			// editCars2Milleage
			// 
			this->editCars2Milleage->BackColor = System::Drawing::SystemColors::Control;
			this->editCars2Milleage->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->editCars2Milleage->Enabled = false;
			this->editCars2Milleage->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->editCars2Milleage->Location = System::Drawing::Point(448, 162);
			this->editCars2Milleage->MaxLength = 45;
			this->editCars2Milleage->Name = L"editCars2Milleage";
			this->editCars2Milleage->Size = System::Drawing::Size(223, 20);
			this->editCars2Milleage->TabIndex = 28;
			// 
			// label24
			// 
			this->label24->AutoSize = true;
			this->label24->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label24->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label24->ForeColor = System::Drawing::Color::White;
			this->label24->Location = System::Drawing::Point(256, 163);
			this->label24->Name = L"label24";
			this->label24->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label24->Size = System::Drawing::Size(117, 19);
			this->label24->TabIndex = 27;
			this->label24->Text = L"Przebieg (km)";
			// 
			// editCars2productionYear
			// 
			this->editCars2productionYear->BackColor = System::Drawing::SystemColors::Control;
			this->editCars2productionYear->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->editCars2productionYear->Enabled = false;
			this->editCars2productionYear->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->editCars2productionYear->Location = System::Drawing::Point(448, 115);
			this->editCars2productionYear->MaxLength = 10;
			this->editCars2productionYear->Name = L"editCars2productionYear";
			this->editCars2productionYear->Size = System::Drawing::Size(223, 20);
			this->editCars2productionYear->TabIndex = 26;
			// 
			// label25
			// 
			this->label25->AutoSize = true;
			this->label25->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label25->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label25->ForeColor = System::Drawing::Color::White;
			this->label25->Location = System::Drawing::Point(256, 116);
			this->label25->Name = L"label25";
			this->label25->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label25->Size = System::Drawing::Size(115, 19);
			this->label25->TabIndex = 25;
			this->label25->Text = L"Rok produkcji";
			// 
			// editCars2Model
			// 
			this->editCars2Model->BackColor = System::Drawing::SystemColors::Control;
			this->editCars2Model->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->editCars2Model->Enabled = false;
			this->editCars2Model->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->editCars2Model->Location = System::Drawing::Point(448, 68);
			this->editCars2Model->MaxLength = 45;
			this->editCars2Model->Name = L"editCars2Model";
			this->editCars2Model->Size = System::Drawing::Size(223, 20);
			this->editCars2Model->TabIndex = 24;
			// 
			// label26
			// 
			this->label26->AutoSize = true;
			this->label26->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label26->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label26->ForeColor = System::Drawing::Color::White;
			this->label26->Location = System::Drawing::Point(256, 69);
			this->label26->Name = L"label26";
			this->label26->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label26->Size = System::Drawing::Size(58, 19);
			this->label26->TabIndex = 23;
			this->label26->Text = L"Model";
			// 
			// editCars2Brand
			// 
			this->editCars2Brand->BackColor = System::Drawing::SystemColors::Control;
			this->editCars2Brand->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->editCars2Brand->Enabled = false;
			this->editCars2Brand->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->editCars2Brand->Location = System::Drawing::Point(448, 21);
			this->editCars2Brand->MaxLength = 45;
			this->editCars2Brand->Name = L"editCars2Brand";
			this->editCars2Brand->Size = System::Drawing::Size(223, 20);
			this->editCars2Brand->TabIndex = 22;
			// 
			// label27
			// 
			this->label27->AutoSize = true;
			this->label27->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label27->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label27->ForeColor = System::Drawing::Color::White;
			this->label27->Location = System::Drawing::Point(256, 22);
			this->label27->Name = L"label27";
			this->label27->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label27->Size = System::Drawing::Size(59, 19);
			this->label27->TabIndex = 21;
			this->label27->Text = L"Marka";
			// 
			// editCars2SaveButton
			// 
			this->editCars2SaveButton->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)),
				static_cast<System::Int32>(static_cast<System::Byte>(87)), static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->editCars2SaveButton->FlatAppearance->BorderSize = 0;
			this->editCars2SaveButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->editCars2SaveButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->editCars2SaveButton->ForeColor = System::Drawing::Color::White;
			this->editCars2SaveButton->Location = System::Drawing::Point(260, 448);
			this->editCars2SaveButton->Name = L"editCars2SaveButton";
			this->editCars2SaveButton->Size = System::Drawing::Size(411, 27);
			this->editCars2SaveButton->TabIndex = 41;
			this->editCars2SaveButton->Text = L"Zapisz";
			this->editCars2SaveButton->UseVisualStyleBackColor = false;
			this->editCars2SaveButton->Visible = false;
			this->editCars2SaveButton->Click += gcnew System::EventHandler(this, &OwnerForm::editCars2SaveButton_Click);
			// 
			// editCars2EditButton
			// 
			this->editCars2EditButton->BackColor = System::Drawing::SystemColors::Control;
			this->editCars2EditButton->FlatAppearance->BorderSize = 0;
			this->editCars2EditButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->editCars2EditButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->editCars2EditButton->ForeColor = System::Drawing::Color::Black;
			this->editCars2EditButton->ImageAlign = System::Drawing::ContentAlignment::MiddleRight;
			this->editCars2EditButton->Location = System::Drawing::Point(410, 448);
			this->editCars2EditButton->Name = L"editCars2EditButton";
			this->editCars2EditButton->Size = System::Drawing::Size(113, 27);
			this->editCars2EditButton->TabIndex = 42;
			this->editCars2EditButton->Text = L"Edytuj";
			this->editCars2EditButton->UseVisualStyleBackColor = false;
			this->editCars2EditButton->Click += gcnew System::EventHandler(this, &OwnerForm::editCars2EditButton_Click);
			// 
			// ordersPanel
			// 
			this->ordersPanel->AutoScroll = true;
			this->ordersPanel->Dock = System::Windows::Forms::DockStyle::Fill;
			this->ordersPanel->Location = System::Drawing::Point(0, 0);
			this->ordersPanel->Name = L"ordersPanel";
			this->ordersPanel->Size = System::Drawing::Size(940, 511);
			this->ordersPanel->TabIndex = 1;
			// 
			// orderDetailsPanel
			// 
			this->orderDetailsPanel->Controls->Add(this->remakeOfferButton);
			this->orderDetailsPanel->Controls->Add(this->label46);
			this->orderDetailsPanel->Controls->Add(this->label45);
			this->orderDetailsPanel->Controls->Add(this->label44);
			this->orderDetailsPanel->Controls->Add(this->label43);
			this->orderDetailsPanel->Controls->Add(this->label42);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsEmail);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsIdentityCard);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsPhoneNo);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsSurname);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsName);
			this->orderDetailsPanel->Controls->Add(this->goBackButton2);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsPriceStrikeout);
			this->orderDetailsPanel->Controls->Add(this->grantedLbl);
			this->orderDetailsPanel->Controls->Add(this->grantDiscountButton);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsDiscount);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsPrice);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsDayOfReturn);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsDayOfPurchase);
			this->orderDetailsPanel->Controls->Add(this->label40);
			this->orderDetailsPanel->Controls->Add(this->label39);
			this->orderDetailsPanel->Controls->Add(this->label38);
			this->orderDetailsPanel->Controls->Add(this->label37);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsNumberPlate);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsGearboxType);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsFuelType);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsPowerhorse);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsCapacity);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsMilleage);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsProduction);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsModel);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsBrand);
			this->orderDetailsPanel->Controls->Add(this->label29);
			this->orderDetailsPanel->Controls->Add(this->label30);
			this->orderDetailsPanel->Controls->Add(this->label31);
			this->orderDetailsPanel->Controls->Add(this->label32);
			this->orderDetailsPanel->Controls->Add(this->label33);
			this->orderDetailsPanel->Controls->Add(this->label34);
			this->orderDetailsPanel->Controls->Add(this->label35);
			this->orderDetailsPanel->Controls->Add(this->label36);
			this->orderDetailsPanel->Controls->Add(this->label41);
			this->orderDetailsPanel->Dock = System::Windows::Forms::DockStyle::Fill;
			this->orderDetailsPanel->Location = System::Drawing::Point(0, 0);
			this->orderDetailsPanel->Name = L"orderDetailsPanel";
			this->orderDetailsPanel->Size = System::Drawing::Size(940, 511);
			this->orderDetailsPanel->TabIndex = 1;
			// 
			// remakeOfferButton
			// 
			this->remakeOfferButton->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)),
				static_cast<System::Int32>(static_cast<System::Byte>(87)), static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->remakeOfferButton->FlatAppearance->BorderSize = 0;
			this->remakeOfferButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->remakeOfferButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->remakeOfferButton->ForeColor = System::Drawing::Color::White;
			this->remakeOfferButton->Location = System::Drawing::Point(139, 469);
			this->remakeOfferButton->Name = L"remakeOfferButton";
			this->remakeOfferButton->Size = System::Drawing::Size(265, 30);
			this->remakeOfferButton->TabIndex = 84;
			this->remakeOfferButton->Text = L"Przywróæ ofertê";
			this->remakeOfferButton->UseVisualStyleBackColor = false;
			this->remakeOfferButton->Click += gcnew System::EventHandler(this, &OwnerForm::remakeOfferButton_Click);
			// 
			// label46
			// 
			this->label46->AutoSize = true;
			this->label46->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label46->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label46->ForeColor = System::Drawing::Color::White;
			this->label46->Location = System::Drawing::Point(579, 434);
			this->label46->Name = L"label46";
			this->label46->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label46->Size = System::Drawing::Size(52, 19);
			this->label46->TabIndex = 83;
			this->label46->Text = L"Email";
			// 
			// label45
			// 
			this->label45->AutoSize = true;
			this->label45->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label45->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label45->ForeColor = System::Drawing::Color::White;
			this->label45->Location = System::Drawing::Point(579, 397);
			this->label45->Name = L"label45";
			this->label45->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label45->Size = System::Drawing::Size(95, 19);
			this->label45->TabIndex = 82;
			this->label45->Text = L"Nr dowodu";
			// 
			// label44
			// 
			this->label44->AutoSize = true;
			this->label44->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label44->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label44->ForeColor = System::Drawing::Color::White;
			this->label44->Location = System::Drawing::Point(579, 360);
			this->label44->Name = L"label44";
			this->label44->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label44->Size = System::Drawing::Size(92, 19);
			this->label44->TabIndex = 81;
			this->label44->Text = L"Nr telefonu";
			// 
			// label43
			// 
			this->label43->AutoSize = true;
			this->label43->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label43->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label43->ForeColor = System::Drawing::Color::White;
			this->label43->Location = System::Drawing::Point(579, 323);
			this->label43->Name = L"label43";
			this->label43->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label43->Size = System::Drawing::Size(81, 19);
			this->label43->TabIndex = 80;
			this->label43->Text = L"Nazwisko";
			// 
			// label42
			// 
			this->label42->AutoSize = true;
			this->label42->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label42->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label42->ForeColor = System::Drawing::Color::White;
			this->label42->Location = System::Drawing::Point(579, 285);
			this->label42->Name = L"label42";
			this->label42->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label42->Size = System::Drawing::Size(43, 19);
			this->label42->TabIndex = 79;
			this->label42->Text = L"Imiê";
			// 
			// orderDetailsEmail
			// 
			this->orderDetailsEmail->AutoSize = true;
			this->orderDetailsEmail->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsEmail->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsEmail->ForeColor = System::Drawing::Color::White;
			this->orderDetailsEmail->Location = System::Drawing::Point(681, 434);
			this->orderDetailsEmail->Name = L"orderDetailsEmail";
			this->orderDetailsEmail->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsEmail->Size = System::Drawing::Size(59, 19);
			this->orderDetailsEmail->TabIndex = 78;
			this->orderDetailsEmail->Text = L"Marka";
			// 
			// orderDetailsIdentityCard
			// 
			this->orderDetailsIdentityCard->AutoSize = true;
			this->orderDetailsIdentityCard->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsIdentityCard->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsIdentityCard->ForeColor = System::Drawing::Color::White;
			this->orderDetailsIdentityCard->Location = System::Drawing::Point(681, 397);
			this->orderDetailsIdentityCard->Name = L"orderDetailsIdentityCard";
			this->orderDetailsIdentityCard->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsIdentityCard->Size = System::Drawing::Size(59, 19);
			this->orderDetailsIdentityCard->TabIndex = 77;
			this->orderDetailsIdentityCard->Text = L"Marka";
			// 
			// orderDetailsPhoneNo
			// 
			this->orderDetailsPhoneNo->AutoSize = true;
			this->orderDetailsPhoneNo->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsPhoneNo->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsPhoneNo->ForeColor = System::Drawing::Color::White;
			this->orderDetailsPhoneNo->Location = System::Drawing::Point(681, 360);
			this->orderDetailsPhoneNo->Name = L"orderDetailsPhoneNo";
			this->orderDetailsPhoneNo->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsPhoneNo->Size = System::Drawing::Size(59, 19);
			this->orderDetailsPhoneNo->TabIndex = 76;
			this->orderDetailsPhoneNo->Text = L"Marka";
			// 
			// orderDetailsSurname
			// 
			this->orderDetailsSurname->AutoSize = true;
			this->orderDetailsSurname->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsSurname->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsSurname->ForeColor = System::Drawing::Color::White;
			this->orderDetailsSurname->Location = System::Drawing::Point(681, 323);
			this->orderDetailsSurname->Name = L"orderDetailsSurname";
			this->orderDetailsSurname->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsSurname->Size = System::Drawing::Size(59, 19);
			this->orderDetailsSurname->TabIndex = 75;
			this->orderDetailsSurname->Text = L"Marka";
			// 
			// orderDetailsName
			// 
			this->orderDetailsName->AutoSize = true;
			this->orderDetailsName->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsName->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsName->ForeColor = System::Drawing::Color::White;
			this->orderDetailsName->Location = System::Drawing::Point(681, 286);
			this->orderDetailsName->Name = L"orderDetailsName";
			this->orderDetailsName->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsName->Size = System::Drawing::Size(59, 19);
			this->orderDetailsName->TabIndex = 74;
			this->orderDetailsName->Text = L"Marka";
			// 
			// goBackButton2
			// 
			this->goBackButton2->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(21)), static_cast<System::Int32>(static_cast<System::Byte>(101)),
				static_cast<System::Int32>(static_cast<System::Byte>(192)));
			this->goBackButton2->FlatAppearance->BorderSize = 0;
			this->goBackButton2->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->goBackButton2->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->goBackButton2->ForeColor = System::Drawing::Color::White;
			this->goBackButton2->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"goBackButton2.Image")));
			this->goBackButton2->ImageAlign = System::Drawing::ContentAlignment::MiddleLeft;
			this->goBackButton2->Location = System::Drawing::Point(9, 9);
			this->goBackButton2->Name = L"goBackButton2";
			this->goBackButton2->Size = System::Drawing::Size(76, 52);
			this->goBackButton2->TabIndex = 73;
			this->goBackButton2->TextAlign = System::Drawing::ContentAlignment::MiddleRight;
			this->goBackButton2->UseVisualStyleBackColor = false;
			this->goBackButton2->Click += gcnew System::EventHandler(this, &OwnerForm::goBackButton2_Click);
			// 
			// orderDetailsPriceStrikeout
			// 
			this->orderDetailsPriceStrikeout->AutoSize = true;
			this->orderDetailsPriceStrikeout->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsPriceStrikeout->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Strikeout)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->orderDetailsPriceStrikeout->ForeColor = System::Drawing::Color::White;
			this->orderDetailsPriceStrikeout->Location = System::Drawing::Point(825, 151);
			this->orderDetailsPriceStrikeout->Name = L"orderDetailsPriceStrikeout";
			this->orderDetailsPriceStrikeout->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsPriceStrikeout->Size = System::Drawing::Size(33, 19);
			this->orderDetailsPriceStrikeout->TabIndex = 72;
			this->orderDetailsPriceStrikeout->Text = L"Od";
			this->orderDetailsPriceStrikeout->Visible = false;
			// 
			// grantedLbl
			// 
			this->grantedLbl->AutoSize = true;
			this->grantedLbl->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->grantedLbl->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->grantedLbl->ForeColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)), static_cast<System::Int32>(static_cast<System::Byte>(87)),
				static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->grantedLbl->Location = System::Drawing::Point(770, 199);
			this->grantedLbl->Name = L"grantedLbl";
			this->grantedLbl->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->grantedLbl->Size = System::Drawing::Size(88, 19);
			this->grantedLbl->TabIndex = 71;
			this->grantedLbl->Text = L"przyznany";
			this->grantedLbl->Visible = false;
			// 
			// grantDiscountButton
			// 
			this->grantDiscountButton->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)),
				static_cast<System::Int32>(static_cast<System::Byte>(87)), static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->grantDiscountButton->FlatAppearance->BorderSize = 0;
			this->grantDiscountButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->grantDiscountButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->grantDiscountButton->ForeColor = System::Drawing::Color::White;
			this->grantDiscountButton->Location = System::Drawing::Point(583, 242);
			this->grantDiscountButton->Name = L"grantDiscountButton";
			this->grantDiscountButton->Size = System::Drawing::Size(157, 30);
			this->grantDiscountButton->TabIndex = 70;
			this->grantDiscountButton->Text = L"Przyznaj upust";
			this->grantDiscountButton->UseVisualStyleBackColor = false;
			this->grantDiscountButton->Click += gcnew System::EventHandler(this, &OwnerForm::grantDiscount);
			// 
			// orderDetailsDiscount
			// 
			this->orderDetailsDiscount->AutoSize = true;
			this->orderDetailsDiscount->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsDiscount->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsDiscount->ForeColor = System::Drawing::Color::White;
			this->orderDetailsDiscount->Location = System::Drawing::Point(707, 199);
			this->orderDetailsDiscount->Name = L"orderDetailsDiscount";
			this->orderDetailsDiscount->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsDiscount->Size = System::Drawing::Size(33, 19);
			this->orderDetailsDiscount->TabIndex = 69;
			this->orderDetailsDiscount->Text = L"Od";
			// 
			// orderDetailsPrice
			// 
			this->orderDetailsPrice->AutoSize = true;
			this->orderDetailsPrice->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsPrice->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsPrice->ForeColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)),
				static_cast<System::Int32>(static_cast<System::Byte>(87)), static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->orderDetailsPrice->Location = System::Drawing::Point(707, 151);
			this->orderDetailsPrice->Name = L"orderDetailsPrice";
			this->orderDetailsPrice->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsPrice->Size = System::Drawing::Size(33, 19);
			this->orderDetailsPrice->TabIndex = 68;
			this->orderDetailsPrice->Text = L"Od";
			// 
			// orderDetailsDayOfReturn
			// 
			this->orderDetailsDayOfReturn->AutoSize = true;
			this->orderDetailsDayOfReturn->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsDayOfReturn->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsDayOfReturn->ForeColor = System::Drawing::Color::White;
			this->orderDetailsDayOfReturn->Location = System::Drawing::Point(707, 106);
			this->orderDetailsDayOfReturn->Name = L"orderDetailsDayOfReturn";
			this->orderDetailsDayOfReturn->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsDayOfReturn->Size = System::Drawing::Size(33, 19);
			this->orderDetailsDayOfReturn->TabIndex = 67;
			this->orderDetailsDayOfReturn->Text = L"Od";
			// 
			// orderDetailsDayOfPurchase
			// 
			this->orderDetailsDayOfPurchase->AutoSize = true;
			this->orderDetailsDayOfPurchase->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsDayOfPurchase->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsDayOfPurchase->ForeColor = System::Drawing::Color::White;
			this->orderDetailsDayOfPurchase->Location = System::Drawing::Point(707, 62);
			this->orderDetailsDayOfPurchase->Name = L"orderDetailsDayOfPurchase";
			this->orderDetailsDayOfPurchase->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsDayOfPurchase->Size = System::Drawing::Size(33, 19);
			this->orderDetailsDayOfPurchase->TabIndex = 66;
			this->orderDetailsDayOfPurchase->Text = L"Od";
			// 
			// label40
			// 
			this->label40->AutoSize = true;
			this->label40->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label40->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label40->ForeColor = System::Drawing::Color::White;
			this->label40->Location = System::Drawing::Point(579, 199);
			this->label40->Name = L"label40";
			this->label40->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label40->Size = System::Drawing::Size(50, 19);
			this->label40->TabIndex = 65;
			this->label40->Text = L"Upust";
			// 
			// label39
			// 
			this->label39->AutoSize = true;
			this->label39->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label39->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label39->ForeColor = System::Drawing::Color::White;
			this->label39->Location = System::Drawing::Point(579, 151);
			this->label39->Name = L"label39";
			this->label39->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label39->Size = System::Drawing::Size(52, 19);
			this->label39->TabIndex = 64;
			this->label39->Text = L"Cena";
			// 
			// label38
			// 
			this->label38->AutoSize = true;
			this->label38->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label38->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label38->ForeColor = System::Drawing::Color::White;
			this->label38->Location = System::Drawing::Point(579, 106);
			this->label38->Name = L"label38";
			this->label38->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label38->Size = System::Drawing::Size(30, 19);
			this->label38->TabIndex = 63;
			this->label38->Text = L"Do";
			// 
			// label37
			// 
			this->label37->AutoSize = true;
			this->label37->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label37->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label37->ForeColor = System::Drawing::Color::White;
			this->label37->Location = System::Drawing::Point(579, 61);
			this->label37->Name = L"label37";
			this->label37->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label37->Size = System::Drawing::Size(33, 19);
			this->label37->TabIndex = 62;
			this->label37->Text = L"Od";
			// 
			// orderDetailsNumberPlate
			// 
			this->orderDetailsNumberPlate->AutoSize = true;
			this->orderDetailsNumberPlate->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsNumberPlate->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsNumberPlate->ForeColor = System::Drawing::Color::White;
			this->orderDetailsNumberPlate->Location = System::Drawing::Point(347, 434);
			this->orderDetailsNumberPlate->Name = L"orderDetailsNumberPlate";
			this->orderDetailsNumberPlate->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsNumberPlate->Size = System::Drawing::Size(59, 19);
			this->orderDetailsNumberPlate->TabIndex = 61;
			this->orderDetailsNumberPlate->Text = L"Marka";
			// 
			// orderDetailsGearboxType
			// 
			this->orderDetailsGearboxType->AutoSize = true;
			this->orderDetailsGearboxType->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsGearboxType->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsGearboxType->ForeColor = System::Drawing::Color::White;
			this->orderDetailsGearboxType->Location = System::Drawing::Point(347, 387);
			this->orderDetailsGearboxType->Name = L"orderDetailsGearboxType";
			this->orderDetailsGearboxType->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsGearboxType->Size = System::Drawing::Size(59, 19);
			this->orderDetailsGearboxType->TabIndex = 60;
			this->orderDetailsGearboxType->Text = L"Marka";
			// 
			// orderDetailsFuelType
			// 
			this->orderDetailsFuelType->AutoSize = true;
			this->orderDetailsFuelType->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsFuelType->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsFuelType->ForeColor = System::Drawing::Color::White;
			this->orderDetailsFuelType->Location = System::Drawing::Point(349, 340);
			this->orderDetailsFuelType->Name = L"orderDetailsFuelType";
			this->orderDetailsFuelType->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsFuelType->Size = System::Drawing::Size(59, 19);
			this->orderDetailsFuelType->TabIndex = 59;
			this->orderDetailsFuelType->Text = L"Marka";
			// 
			// orderDetailsPowerhorse
			// 
			this->orderDetailsPowerhorse->AutoSize = true;
			this->orderDetailsPowerhorse->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsPowerhorse->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsPowerhorse->ForeColor = System::Drawing::Color::White;
			this->orderDetailsPowerhorse->Location = System::Drawing::Point(347, 293);
			this->orderDetailsPowerhorse->Name = L"orderDetailsPowerhorse";
			this->orderDetailsPowerhorse->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsPowerhorse->Size = System::Drawing::Size(59, 19);
			this->orderDetailsPowerhorse->TabIndex = 58;
			this->orderDetailsPowerhorse->Text = L"Marka";
			// 
			// orderDetailsCapacity
			// 
			this->orderDetailsCapacity->AutoSize = true;
			this->orderDetailsCapacity->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsCapacity->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsCapacity->ForeColor = System::Drawing::Color::White;
			this->orderDetailsCapacity->Location = System::Drawing::Point(349, 246);
			this->orderDetailsCapacity->Name = L"orderDetailsCapacity";
			this->orderDetailsCapacity->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsCapacity->Size = System::Drawing::Size(59, 19);
			this->orderDetailsCapacity->TabIndex = 57;
			this->orderDetailsCapacity->Text = L"Marka";
			// 
			// orderDetailsMilleage
			// 
			this->orderDetailsMilleage->AutoSize = true;
			this->orderDetailsMilleage->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsMilleage->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsMilleage->ForeColor = System::Drawing::Color::White;
			this->orderDetailsMilleage->Location = System::Drawing::Point(346, 201);
			this->orderDetailsMilleage->Name = L"orderDetailsMilleage";
			this->orderDetailsMilleage->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsMilleage->Size = System::Drawing::Size(59, 19);
			this->orderDetailsMilleage->TabIndex = 56;
			this->orderDetailsMilleage->Text = L"Marka";
			// 
			// orderDetailsProduction
			// 
			this->orderDetailsProduction->AutoSize = true;
			this->orderDetailsProduction->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsProduction->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsProduction->ForeColor = System::Drawing::Color::White;
			this->orderDetailsProduction->Location = System::Drawing::Point(346, 154);
			this->orderDetailsProduction->Name = L"orderDetailsProduction";
			this->orderDetailsProduction->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsProduction->Size = System::Drawing::Size(59, 19);
			this->orderDetailsProduction->TabIndex = 55;
			this->orderDetailsProduction->Text = L"Marka";
			// 
			// orderDetailsModel
			// 
			this->orderDetailsModel->AutoSize = true;
			this->orderDetailsModel->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsModel->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsModel->ForeColor = System::Drawing::Color::White;
			this->orderDetailsModel->Location = System::Drawing::Point(346, 106);
			this->orderDetailsModel->Name = L"orderDetailsModel";
			this->orderDetailsModel->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsModel->Size = System::Drawing::Size(59, 19);
			this->orderDetailsModel->TabIndex = 54;
			this->orderDetailsModel->Text = L"Marka";
			// 
			// orderDetailsBrand
			// 
			this->orderDetailsBrand->AutoSize = true;
			this->orderDetailsBrand->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsBrand->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsBrand->ForeColor = System::Drawing::Color::White;
			this->orderDetailsBrand->Location = System::Drawing::Point(346, 60);
			this->orderDetailsBrand->Name = L"orderDetailsBrand";
			this->orderDetailsBrand->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsBrand->Size = System::Drawing::Size(59, 19);
			this->orderDetailsBrand->TabIndex = 53;
			this->orderDetailsBrand->Text = L"Marka";
			// 
			// label29
			// 
			this->label29->AutoSize = true;
			this->label29->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label29->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label29->ForeColor = System::Drawing::Color::White;
			this->label29->Location = System::Drawing::Point(135, 434);
			this->label29->Name = L"label29";
			this->label29->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label29->Size = System::Drawing::Size(127, 19);
			this->label29->TabIndex = 52;
			this->label29->Text = L"Nr rejestracyjny";
			// 
			// label30
			// 
			this->label30->AutoSize = true;
			this->label30->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label30->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label30->ForeColor = System::Drawing::Color::White;
			this->label30->Location = System::Drawing::Point(135, 387);
			this->label30->Name = L"label30";
			this->label30->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label30->Size = System::Drawing::Size(90, 19);
			this->label30->TabIndex = 51;
			this->label30->Text = L"Typ skrzyni";
			// 
			// label31
			// 
			this->label31->AutoSize = true;
			this->label31->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label31->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label31->ForeColor = System::Drawing::Color::White;
			this->label31->Location = System::Drawing::Point(135, 340);
			this->label31->Name = L"label31";
			this->label31->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label31->Size = System::Drawing::Size(94, 19);
			this->label31->TabIndex = 50;
			this->label31->Text = L"Typ paliwa";
			// 
			// label32
			// 
			this->label32->AutoSize = true;
			this->label32->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label32->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label32->ForeColor = System::Drawing::Color::White;
			this->label32->Location = System::Drawing::Point(135, 293);
			this->label32->Name = L"label32";
			this->label32->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label32->Size = System::Drawing::Size(33, 19);
			this->label32->TabIndex = 49;
			this->label32->Text = L"KM";
			// 
			// label33
			// 
			this->label33->AutoSize = true;
			this->label33->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label33->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label33->ForeColor = System::Drawing::Color::White;
			this->label33->Location = System::Drawing::Point(135, 246);
			this->label33->Name = L"label33";
			this->label33->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label33->Size = System::Drawing::Size(175, 19);
			this->label33->TabIndex = 48;
			this->label33->Text = L"Pojemnoœæ (w litrach)";
			// 
			// label34
			// 
			this->label34->AutoSize = true;
			this->label34->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label34->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label34->ForeColor = System::Drawing::Color::White;
			this->label34->Location = System::Drawing::Point(135, 199);
			this->label34->Name = L"label34";
			this->label34->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label34->Size = System::Drawing::Size(117, 19);
			this->label34->TabIndex = 47;
			this->label34->Text = L"Przebieg (km)";
			// 
			// label35
			// 
			this->label35->AutoSize = true;
			this->label35->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label35->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label35->ForeColor = System::Drawing::Color::White;
			this->label35->Location = System::Drawing::Point(135, 152);
			this->label35->Name = L"label35";
			this->label35->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label35->Size = System::Drawing::Size(115, 19);
			this->label35->TabIndex = 46;
			this->label35->Text = L"Rok produkcji";
			// 
			// label36
			// 
			this->label36->AutoSize = true;
			this->label36->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label36->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label36->ForeColor = System::Drawing::Color::White;
			this->label36->Location = System::Drawing::Point(135, 105);
			this->label36->Name = L"label36";
			this->label36->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label36->Size = System::Drawing::Size(58, 19);
			this->label36->TabIndex = 45;
			this->label36->Text = L"Model";
			// 
			// label41
			// 
			this->label41->AutoSize = true;
			this->label41->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label41->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label41->ForeColor = System::Drawing::Color::White;
			this->label41->Location = System::Drawing::Point(135, 58);
			this->label41->Name = L"label41";
			this->label41->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label41->Size = System::Drawing::Size(59, 19);
			this->label41->TabIndex = 44;
			this->label41->Text = L"Marka";
			// 
			// slidePanel
			// 
			this->slidePanel->AutoScroll = true;
			this->slidePanel->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(33)), static_cast<System::Int32>(static_cast<System::Byte>(150)),
				static_cast<System::Int32>(static_cast<System::Byte>(243)));
			this->slidePanel->Controls->Add(this->offersSlidePanel);
			this->slidePanel->Dock = System::Windows::Forms::DockStyle::Left;
			this->slidePanel->Location = System::Drawing::Point(242, 70);
			this->slidePanel->Name = L"slidePanel";
			this->slidePanel->Size = System::Drawing::Size(0, 511);
			this->slidePanel->TabIndex = 3;
			// 
			// offersSlidePanel
			// 
			this->offersSlidePanel->Controls->Add(this->editCarsButton);
			this->offersSlidePanel->Controls->Add(this->addCarButton);
			this->offersSlidePanel->Controls->Add(this->addOfferButton);
			this->offersSlidePanel->Dock = System::Windows::Forms::DockStyle::Fill;
			this->offersSlidePanel->Location = System::Drawing::Point(0, 0);
			this->offersSlidePanel->Name = L"offersSlidePanel";
			this->offersSlidePanel->Size = System::Drawing::Size(0, 511);
			this->offersSlidePanel->TabIndex = 0;
			// 
			// editCarsButton
			// 
			this->editCarsButton->FlatAppearance->BorderSize = 0;
			this->editCarsButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->editCarsButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 14.25F, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->editCarsButton->ForeColor = System::Drawing::Color::White;
			this->editCarsButton->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"editCarsButton.Image")));
			this->editCarsButton->ImageAlign = System::Drawing::ContentAlignment::MiddleLeft;
			this->editCarsButton->Location = System::Drawing::Point(103, 349);
			this->editCarsButton->Name = L"editCarsButton";
			this->editCarsButton->Size = System::Drawing::Size(262, 79);
			this->editCarsButton->TabIndex = 9;
			this->editCarsButton->Text = L"Przegl¹daj auta";
			this->editCarsButton->TextAlign = System::Drawing::ContentAlignment::MiddleRight;
			this->editCarsButton->UseVisualStyleBackColor = true;
			this->editCarsButton->Click += gcnew System::EventHandler(this, &OwnerForm::editCarsButton_Click);
			// 
			// addCarButton
			// 
			this->addCarButton->FlatAppearance->BorderSize = 0;
			this->addCarButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->addCarButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 14.25F, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->addCarButton->ForeColor = System::Drawing::Color::White;
			this->addCarButton->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"addCarButton.Image")));
			this->addCarButton->ImageAlign = System::Drawing::ContentAlignment::MiddleLeft;
			this->addCarButton->Location = System::Drawing::Point(103, 193);
			this->addCarButton->Name = L"addCarButton";
			this->addCarButton->Size = System::Drawing::Size(212, 79);
			this->addCarButton->TabIndex = 8;
			this->addCarButton->Text = L"Dodaj auto";
			this->addCarButton->TextAlign = System::Drawing::ContentAlignment::MiddleRight;
			this->addCarButton->UseVisualStyleBackColor = true;
			this->addCarButton->Click += gcnew System::EventHandler(this, &OwnerForm::addCarButton_Click);
			// 
			// addOfferButton
			// 
			this->addOfferButton->FlatAppearance->BorderSize = 0;
			this->addOfferButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->addOfferButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 14.25F, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->addOfferButton->ForeColor = System::Drawing::Color::White;
			this->addOfferButton->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"addOfferButton.Image")));
			this->addOfferButton->ImageAlign = System::Drawing::ContentAlignment::MiddleLeft;
			this->addOfferButton->Location = System::Drawing::Point(103, 37);
			this->addOfferButton->Name = L"addOfferButton";
			this->addOfferButton->Size = System::Drawing::Size(212, 79);
			this->addOfferButton->TabIndex = 7;
			this->addOfferButton->Text = L"Dodaj ofertê";
			this->addOfferButton->TextAlign = System::Drawing::ContentAlignment::MiddleRight;
			this->addOfferButton->UseVisualStyleBackColor = true;
			this->addOfferButton->Click += gcnew System::EventHandler(this, &OwnerForm::addOfferButton_Click);
			// 
			// timer1
			// 
			this->timer1->Interval = 1;
			this->timer1->Tick += gcnew System::EventHandler(this, &OwnerForm::timer1_Tick);
			// 
			// OwnerForm
			// 
			this->AutoScaleMode = System::Windows::Forms::AutoScaleMode::None;
			this->ClientSize = System::Drawing::Size(1182, 581);
			this->Controls->Add(this->panel3);
			this->Controls->Add(this->slidePanel);
			this->Controls->Add(this->panel2);
			this->Controls->Add(this->panel1);
			this->FormBorderStyle = System::Windows::Forms::FormBorderStyle::None;
			this->Icon = (cli::safe_cast<System::Drawing::Icon^>(resources->GetObject(L"$this.Icon")));
			this->Name = L"OwnerForm";
			this->StartPosition = System::Windows::Forms::FormStartPosition::CenterScreen;
			this->Text = L"OwnerForm";
			this->panel1->ResumeLayout(false);
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->pictureBox1))->EndInit();
			this->panel2->ResumeLayout(false);
			this->panel2->PerformLayout();
			this->panel3->ResumeLayout(false);
			this->offersPanel->ResumeLayout(false);
			this->offersPanel->PerformLayout();
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->welcomePic))->EndInit();
			this->infoPanel->ResumeLayout(false);
			this->infoPanel->PerformLayout();
			this->addOfferPanel->ResumeLayout(false);
			this->addOfferPanel->PerformLayout();
			this->addCarPanel->ResumeLayout(false);
			this->addCarPanel->PerformLayout();
			this->offerDetailsPanel->ResumeLayout(false);
			this->offerDetailsPanel->PerformLayout();
			this->editCarsPanel2->ResumeLayout(false);
			this->editCarsPanel2->PerformLayout();
			this->orderDetailsPanel->ResumeLayout(false);
			this->orderDetailsPanel->PerformLayout();
			this->slidePanel->ResumeLayout(false);
			this->offersSlidePanel->ResumeLayout(false);
			this->ResumeLayout(false);

		}

	private: System::Void logoutButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: void slidePanelEvents();
	private: System::Void timer1_Tick(System::Object^  sender, System::EventArgs^  e);
	private: System::Void offersButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void usersButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void ordersButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void infoButton_Click(System::Object^  sender, System::EventArgs^  e);
	public: void displayUsers();
	private: void loadOffersTable();

	//obs³uga klikniêcia kontrolki offerControl
	private: void showDetailOfferClick(Object^ sender, System::EventArgs^  e);
	private: void loadOrdersTable();
	private: void showOrderButtonClick(System::Object^ sender, System::EventArgs^ e);
	private: void loadCarsTable();
	private: void showDetailCarClick(System::Object^ sender, System::EventArgs^ e);
	private: System::Void addOfferButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void addOffer(System::Object^  sender, System::EventArgs^  e);
	private: System::Void addCarButton_Click(System::Object^  sender, System::EventArgs^  e); //ta funkcja pokazuje formularz dodawania auta (formularz wprowadzania danych o nowym aucie)
	private: System::Void addCar2Button_Click(System::Object^  sender, System::EventArgs^  e);  //ta funkcja jest odpowiedzialna za dodanie auta do bazy
	private: System::Void editCarsButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void editOfferDetailsButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void saveChangesOfferDetailButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void deleteOfferDetailButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void goBackButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void goToCarListButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void deleteCarButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void editCars2EditButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void editCars2SaveButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void showMoreButton_Click(System::Object^  sender, System::EventArgs^  e); //obs³uguje zdarzenie wciœniêcia przycisku dwóch strza³ek zwróconych w prawo
	private: System::Void grantDiscount(System::Object^  sender, System::EventArgs^  e);
	private: System::Void goBackButton2_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void remakeOfferButton_Click(System::Object^  sender, System::EventArgs^  e);
};
}
#endif // !OwnerForm_h
