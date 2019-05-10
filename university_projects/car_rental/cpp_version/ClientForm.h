#ifndef ClientForm_h
#define ClientForm_h

#include "Offer.h";
#include "Car.h";
#include "offerSlideControl.h";
#include "Order.h";
#include "orderSlideControl.h";
namespace carrental {

	using namespace System;
	using namespace System::ComponentModel;
	using namespace System::Collections;
	using namespace System::Windows::Forms;
	using namespace System::Data;
	using namespace System::Drawing;
	using namespace MySql::Data::MySqlClient;

	/// <summary>
	/// Podsumowanie informacji o ClientForm
	/// </summary>
	public ref class ClientForm : public System::Windows::Forms::Form
	{
	private:
		String^ connectionString = L"datasource=localhost;port=3307;username=root;password=root";
		MySqlConnection^ connecter = gcnew MySqlConnection(connectionString);
		int clientId;
		int slidePanelMaxWidth = 410;
		Boolean hidden = true;
		Form^ loginForm;
		int offersCount = 0;
		int carsCount = 0;
		int clientsOrderCount = 0;
		array<Offer^>^ offers;
		array<Car^>^ cars;
		array<offerSlideControl^>^ offerControls;
		array<Order^>^ clientsOrders;
		array<orderSlideControl^>^ orderControls;


	private: System::Windows::Forms::Timer^  timer1;
	private: System::Windows::Forms::Button^  offersButton;
	private: System::Windows::Forms::Button^  ordersButton;
	private: System::Windows::Forms::Button^  infoButton;
	private: System::Windows::Forms::Button^  accountButton;
	private: System::Windows::Forms::Panel^  marker;
	private: System::Windows::Forms::Panel^  accountPanel;
	private: System::Windows::Forms::TextBox^  CloginTextBox;
	private: System::Windows::Forms::TextBox^  CemailTextBox;
	private: System::Windows::Forms::TextBox^  CidCardTextBox;
	private: System::Windows::Forms::TextBox^  CphoneNoTextBox;
	private: System::Windows::Forms::TextBox^  CsurnameTextBox;
	private: System::Windows::Forms::Label^  label6;
	private: System::Windows::Forms::Label^  label5;
	private: System::Windows::Forms::Label^  label4;
	private: System::Windows::Forms::Label^  label3;
	private: System::Windows::Forms::Label^  label2;
	private: System::Windows::Forms::Label^  label7;
	private: System::Windows::Forms::TextBox^  CnameTextBox;
	private: System::Windows::Forms::TextBox^  CpasswordTextBox;
	private: System::Windows::Forms::Label^  label8;
	private: System::Windows::Forms::Button^  changeDataButton;
	private: System::Windows::Forms::Button^  acceptChangeButton;
	private: System::Windows::Forms::Panel^  offerPanel;
	private: System::Windows::Forms::Label^  infoLbl;
	private: System::Windows::Forms::Label^  welcomeLbl;
	private: System::Windows::Forms::PictureBox^  pictureBox2;
	private: System::Windows::Forms::Panel^  infoPanel;
	private: System::Windows::Forms::Button^  deleteUserButton;
	private: System::Windows::Forms::Panel^  offerDetailsPanel;
	private: System::Windows::Forms::Label^  offerDetailsNumberPlate;
	private: System::Windows::Forms::Label^  offerDetailsGearboxType;
	private: System::Windows::Forms::Label^  offerDetailsFuelType;
	private: System::Windows::Forms::Label^  offerDetailsPowerhorse;
	private: System::Windows::Forms::Label^  offerDetailsCapacity;
	private: System::Windows::Forms::Label^  offerDetailsMilleage;
	private: System::Windows::Forms::Label^  offerDetailsProduction;
	private: System::Windows::Forms::Label^  offerDetailsModel;
	private: System::Windows::Forms::Label^  offerDetailsBrand;
	private: System::Windows::Forms::Label^  label18;
	private: System::Windows::Forms::Label^  label17;
	private: System::Windows::Forms::Label^  label16;
	private: System::Windows::Forms::Label^  label15;
	private: System::Windows::Forms::Label^  label14;
	private: System::Windows::Forms::Label^  label19;
	private: System::Windows::Forms::Label^  label20;
	private: System::Windows::Forms::Label^  label21;
	private: System::Windows::Forms::Label^  label22;
	private: System::Windows::Forms::Button^  goBackButton;
	private: System::Windows::Forms::Label^  label23;
	private: System::Windows::Forms::Label^  offerDetailsPrice;
	private: System::Windows::Forms::Button^  makeOrderButton;
	private: System::Windows::Forms::TextBox^  discountTextBox;
	private: System::Windows::Forms::Label^  label27;
	private: System::Windows::Forms::Button^  calculateButton;
	private: System::Windows::Forms::Label^  priceSum;
	private: System::Windows::Forms::Label^  label26;
	private: System::Windows::Forms::DateTimePicker^  dateOfReturnPicker;
	private: System::Windows::Forms::Label^  label25;
	private: System::Windows::Forms::Label^  label24;
	private: System::Windows::Forms::DateTimePicker^  dateOfPurchasePicker;
	private: System::Windows::Forms::Panel^  orderDetailsPanel;
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
	private: System::Windows::Forms::Label^  label28;
	private: System::Windows::Forms::Label^  label29;
	private: System::Windows::Forms::Label^  label30;
	private: System::Windows::Forms::Label^  label31;
	private: System::Windows::Forms::Label^  label32;
	private: System::Windows::Forms::Label^  label33;
	private: System::Windows::Forms::Label^  label34;
	private: System::Windows::Forms::Label^  label35;
	private: System::Windows::Forms::Label^  label36;
	private: System::Windows::Forms::Label^  orderDetailsPriceStrikeout;
	private: System::Windows::Forms::Button^  goBackButton2;
private: System::Windows::Forms::Label^  label13;
private: System::Windows::Forms::Label^  label12;
private: System::Windows::Forms::Label^  label11;
private: System::Windows::Forms::Label^  label10;
private: System::Windows::Forms::Label^  label9;



	private: System::Windows::Forms::Panel^  ordersPanel;

	public:
		ClientForm(int id, Form^ form);

	protected:
		~ClientForm();
	private: System::Windows::Forms::Panel^  panel1;
	protected:
	private: System::Windows::Forms::Panel^  panel2;
	private: System::Windows::Forms::Panel^  slidePanel;
	private: System::Windows::Forms::Panel^  panel3;
	private: System::Windows::Forms::Label^  label1;
	private: System::Windows::Forms::PictureBox^  pictureBox1;
	private: System::Windows::Forms::Button^  logoutButton;
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
			System::ComponentModel::ComponentResourceManager^  resources = (gcnew System::ComponentModel::ComponentResourceManager(ClientForm::typeid));
			this->panel1 = (gcnew System::Windows::Forms::Panel());
			this->marker = (gcnew System::Windows::Forms::Panel());
			this->ordersButton = (gcnew System::Windows::Forms::Button());
			this->infoButton = (gcnew System::Windows::Forms::Button());
			this->accountButton = (gcnew System::Windows::Forms::Button());
			this->offersButton = (gcnew System::Windows::Forms::Button());
			this->pictureBox1 = (gcnew System::Windows::Forms::PictureBox());
			this->panel2 = (gcnew System::Windows::Forms::Panel());
			this->logoutButton = (gcnew System::Windows::Forms::Button());
			this->label1 = (gcnew System::Windows::Forms::Label());
			this->slidePanel = (gcnew System::Windows::Forms::Panel());
			this->ordersPanel = (gcnew System::Windows::Forms::Panel());
			this->panel3 = (gcnew System::Windows::Forms::Panel());
			this->offerPanel = (gcnew System::Windows::Forms::Panel());
			this->infoLbl = (gcnew System::Windows::Forms::Label());
			this->welcomeLbl = (gcnew System::Windows::Forms::Label());
			this->pictureBox2 = (gcnew System::Windows::Forms::PictureBox());
			this->accountPanel = (gcnew System::Windows::Forms::Panel());
			this->deleteUserButton = (gcnew System::Windows::Forms::Button());
			this->CpasswordTextBox = (gcnew System::Windows::Forms::TextBox());
			this->label8 = (gcnew System::Windows::Forms::Label());
			this->CloginTextBox = (gcnew System::Windows::Forms::TextBox());
			this->CemailTextBox = (gcnew System::Windows::Forms::TextBox());
			this->CidCardTextBox = (gcnew System::Windows::Forms::TextBox());
			this->CphoneNoTextBox = (gcnew System::Windows::Forms::TextBox());
			this->CsurnameTextBox = (gcnew System::Windows::Forms::TextBox());
			this->label6 = (gcnew System::Windows::Forms::Label());
			this->label5 = (gcnew System::Windows::Forms::Label());
			this->label4 = (gcnew System::Windows::Forms::Label());
			this->label3 = (gcnew System::Windows::Forms::Label());
			this->label2 = (gcnew System::Windows::Forms::Label());
			this->label7 = (gcnew System::Windows::Forms::Label());
			this->CnameTextBox = (gcnew System::Windows::Forms::TextBox());
			this->acceptChangeButton = (gcnew System::Windows::Forms::Button());
			this->changeDataButton = (gcnew System::Windows::Forms::Button());
			this->infoPanel = (gcnew System::Windows::Forms::Panel());
			this->offerDetailsPanel = (gcnew System::Windows::Forms::Panel());
			this->makeOrderButton = (gcnew System::Windows::Forms::Button());
			this->discountTextBox = (gcnew System::Windows::Forms::TextBox());
			this->label27 = (gcnew System::Windows::Forms::Label());
			this->calculateButton = (gcnew System::Windows::Forms::Button());
			this->priceSum = (gcnew System::Windows::Forms::Label());
			this->label26 = (gcnew System::Windows::Forms::Label());
			this->dateOfReturnPicker = (gcnew System::Windows::Forms::DateTimePicker());
			this->label25 = (gcnew System::Windows::Forms::Label());
			this->label24 = (gcnew System::Windows::Forms::Label());
			this->dateOfPurchasePicker = (gcnew System::Windows::Forms::DateTimePicker());
			this->offerDetailsPrice = (gcnew System::Windows::Forms::Label());
			this->label23 = (gcnew System::Windows::Forms::Label());
			this->goBackButton = (gcnew System::Windows::Forms::Button());
			this->offerDetailsNumberPlate = (gcnew System::Windows::Forms::Label());
			this->offerDetailsGearboxType = (gcnew System::Windows::Forms::Label());
			this->offerDetailsFuelType = (gcnew System::Windows::Forms::Label());
			this->offerDetailsPowerhorse = (gcnew System::Windows::Forms::Label());
			this->offerDetailsCapacity = (gcnew System::Windows::Forms::Label());
			this->offerDetailsMilleage = (gcnew System::Windows::Forms::Label());
			this->offerDetailsProduction = (gcnew System::Windows::Forms::Label());
			this->offerDetailsModel = (gcnew System::Windows::Forms::Label());
			this->offerDetailsBrand = (gcnew System::Windows::Forms::Label());
			this->label18 = (gcnew System::Windows::Forms::Label());
			this->label17 = (gcnew System::Windows::Forms::Label());
			this->label16 = (gcnew System::Windows::Forms::Label());
			this->label15 = (gcnew System::Windows::Forms::Label());
			this->label14 = (gcnew System::Windows::Forms::Label());
			this->label19 = (gcnew System::Windows::Forms::Label());
			this->label20 = (gcnew System::Windows::Forms::Label());
			this->label21 = (gcnew System::Windows::Forms::Label());
			this->label22 = (gcnew System::Windows::Forms::Label());
			this->orderDetailsPanel = (gcnew System::Windows::Forms::Panel());
			this->goBackButton2 = (gcnew System::Windows::Forms::Button());
			this->orderDetailsPriceStrikeout = (gcnew System::Windows::Forms::Label());
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
			this->label28 = (gcnew System::Windows::Forms::Label());
			this->label29 = (gcnew System::Windows::Forms::Label());
			this->label30 = (gcnew System::Windows::Forms::Label());
			this->label31 = (gcnew System::Windows::Forms::Label());
			this->label32 = (gcnew System::Windows::Forms::Label());
			this->label33 = (gcnew System::Windows::Forms::Label());
			this->label34 = (gcnew System::Windows::Forms::Label());
			this->label35 = (gcnew System::Windows::Forms::Label());
			this->label36 = (gcnew System::Windows::Forms::Label());
			this->timer1 = (gcnew System::Windows::Forms::Timer(this->components));
			this->label13 = (gcnew System::Windows::Forms::Label());
			this->label12 = (gcnew System::Windows::Forms::Label());
			this->label11 = (gcnew System::Windows::Forms::Label());
			this->label10 = (gcnew System::Windows::Forms::Label());
			this->label9 = (gcnew System::Windows::Forms::Label());
			this->panel1->SuspendLayout();
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->pictureBox1))->BeginInit();
			this->panel2->SuspendLayout();
			this->slidePanel->SuspendLayout();
			this->panel3->SuspendLayout();
			this->offerPanel->SuspendLayout();
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->pictureBox2))->BeginInit();
			this->accountPanel->SuspendLayout();
			this->infoPanel->SuspendLayout();
			this->offerDetailsPanel->SuspendLayout();
			this->orderDetailsPanel->SuspendLayout();
			this->SuspendLayout();
			// 
			// panel1
			// 
			this->panel1->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(21)), static_cast<System::Int32>(static_cast<System::Byte>(101)),
				static_cast<System::Int32>(static_cast<System::Byte>(192)));
			this->panel1->Controls->Add(this->marker);
			this->panel1->Controls->Add(this->ordersButton);
			this->panel1->Controls->Add(this->infoButton);
			this->panel1->Controls->Add(this->accountButton);
			this->panel1->Controls->Add(this->offersButton);
			this->panel1->Controls->Add(this->pictureBox1);
			this->panel1->Dock = System::Windows::Forms::DockStyle::Left;
			this->panel1->Location = System::Drawing::Point(0, 0);
			this->panel1->Name = L"panel1";
			this->panel1->Size = System::Drawing::Size(242, 620);
			this->panel1->TabIndex = 0;
			// 
			// marker
			// 
			this->marker->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)), static_cast<System::Int32>(static_cast<System::Byte>(87)),
				static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->marker->Location = System::Drawing::Point(0, 118);
			this->marker->Name = L"marker";
			this->marker->Size = System::Drawing::Size(14, 79);
			this->marker->TabIndex = 3;
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
			this->ordersButton->Location = System::Drawing::Point(20, 231);
			this->ordersButton->Name = L"ordersButton";
			this->ordersButton->Size = System::Drawing::Size(216, 79);
			this->ordersButton->TabIndex = 5;
			this->ordersButton->Text = L"Zamówienia";
			this->ordersButton->TextAlign = System::Drawing::ContentAlignment::MiddleRight;
			this->ordersButton->UseVisualStyleBackColor = true;
			this->ordersButton->Click += gcnew System::EventHandler(this, &ClientForm::displayOrders);
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
			this->infoButton->Location = System::Drawing::Point(20, 457);
			this->infoButton->Name = L"infoButton";
			this->infoButton->Size = System::Drawing::Size(213, 79);
			this->infoButton->TabIndex = 4;
			this->infoButton->Text = L"Informacje";
			this->infoButton->TextAlign = System::Drawing::ContentAlignment::MiddleRight;
			this->infoButton->UseVisualStyleBackColor = true;
			this->infoButton->Click += gcnew System::EventHandler(this, &ClientForm::infoButton_Click);
			// 
			// accountButton
			// 
			this->accountButton->FlatAppearance->BorderSize = 0;
			this->accountButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->accountButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 14.25F, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->accountButton->ForeColor = System::Drawing::Color::White;
			this->accountButton->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"accountButton.Image")));
			this->accountButton->ImageAlign = System::Drawing::ContentAlignment::MiddleLeft;
			this->accountButton->Location = System::Drawing::Point(20, 344);
			this->accountButton->Name = L"accountButton";
			this->accountButton->Size = System::Drawing::Size(213, 79);
			this->accountButton->TabIndex = 3;
			this->accountButton->Text = L"Moje konto";
			this->accountButton->TextAlign = System::Drawing::ContentAlignment::MiddleRight;
			this->accountButton->UseVisualStyleBackColor = true;
			this->accountButton->Click += gcnew System::EventHandler(this, &ClientForm::accountButton_Click);
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
			this->offersButton->Location = System::Drawing::Point(24, 118);
			this->offersButton->Name = L"offersButton";
			this->offersButton->Size = System::Drawing::Size(174, 79);
			this->offersButton->TabIndex = 1;
			this->offersButton->Text = L"Oferty";
			this->offersButton->TextAlign = System::Drawing::ContentAlignment::MiddleRight;
			this->offersButton->UseVisualStyleBackColor = true;
			this->offersButton->Click += gcnew System::EventHandler(this, &ClientForm::displayOffers);
			// 
			// pictureBox1
			// 
			this->pictureBox1->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"pictureBox1.Image")));
			this->pictureBox1->Location = System::Drawing::Point(65, 1);
			this->pictureBox1->Name = L"pictureBox1";
			this->pictureBox1->Size = System::Drawing::Size(101, 73);
			this->pictureBox1->SizeMode = System::Windows::Forms::PictureBoxSizeMode::Zoom;
			this->pictureBox1->TabIndex = 0;
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
			this->panel2->Size = System::Drawing::Size(956, 70);
			this->panel2->TabIndex = 1;
			// 
			// logoutButton
			// 
			this->logoutButton->FlatAppearance->BorderSize = 0;
			this->logoutButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->logoutButton->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"logoutButton.Image")));
			this->logoutButton->Location = System::Drawing::Point(881, 4);
			this->logoutButton->Name = L"logoutButton";
			this->logoutButton->Size = System::Drawing::Size(75, 60);
			this->logoutButton->TabIndex = 1;
			this->logoutButton->UseVisualStyleBackColor = true;
			this->logoutButton->Click += gcnew System::EventHandler(this, &ClientForm::logOut);
			// 
			// label1
			// 
			this->label1->AutoSize = true;
			this->label1->Font = (gcnew System::Drawing::Font(L"Century Gothic", 20.25F, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->label1->Location = System::Drawing::Point(6, 25);
			this->label1->Name = L"label1";
			this->label1->Size = System::Drawing::Size(260, 33);
			this->label1->TabIndex = 0;
			this->label1->Text = L"Wypo¿yczalnia aut";
			// 
			// slidePanel
			// 
			this->slidePanel->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(33)), static_cast<System::Int32>(static_cast<System::Byte>(150)),
				static_cast<System::Int32>(static_cast<System::Byte>(243)));
			this->slidePanel->Controls->Add(this->ordersPanel);
			this->slidePanel->Dock = System::Windows::Forms::DockStyle::Left;
			this->slidePanel->Location = System::Drawing::Point(242, 70);
			this->slidePanel->Name = L"slidePanel";
			this->slidePanel->Size = System::Drawing::Size(0, 550);
			this->slidePanel->TabIndex = 2;
			// 
			// ordersPanel
			// 
			this->ordersPanel->AutoScroll = true;
			this->ordersPanel->Dock = System::Windows::Forms::DockStyle::Fill;
			this->ordersPanel->Location = System::Drawing::Point(0, 0);
			this->ordersPanel->Name = L"ordersPanel";
			this->ordersPanel->Size = System::Drawing::Size(0, 550);
			this->ordersPanel->TabIndex = 0;
			// 
			// panel3
			// 
			this->panel3->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(21)), static_cast<System::Int32>(static_cast<System::Byte>(101)),
				static_cast<System::Int32>(static_cast<System::Byte>(192)));
			this->panel3->Controls->Add(this->offerPanel);
			this->panel3->Controls->Add(this->accountPanel);
			this->panel3->Controls->Add(this->infoPanel);
			this->panel3->Controls->Add(this->offerDetailsPanel);
			this->panel3->Controls->Add(this->orderDetailsPanel);
			this->panel3->Dock = System::Windows::Forms::DockStyle::Fill;
			this->panel3->Location = System::Drawing::Point(242, 70);
			this->panel3->Name = L"panel3";
			this->panel3->Size = System::Drawing::Size(956, 550);
			this->panel3->TabIndex = 3;
			// 
			// offerPanel
			// 
			this->offerPanel->Controls->Add(this->infoLbl);
			this->offerPanel->Controls->Add(this->welcomeLbl);
			this->offerPanel->Controls->Add(this->pictureBox2);
			this->offerPanel->Dock = System::Windows::Forms::DockStyle::Fill;
			this->offerPanel->Location = System::Drawing::Point(0, 0);
			this->offerPanel->Name = L"offerPanel";
			this->offerPanel->Size = System::Drawing::Size(956, 550);
			this->offerPanel->TabIndex = 30;
			// 
			// infoLbl
			// 
			this->infoLbl->AutoSize = true;
			this->infoLbl->Font = (gcnew System::Drawing::Font(L"Century Gothic", 18, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->infoLbl->ForeColor = System::Drawing::Color::White;
			this->infoLbl->Location = System::Drawing::Point(236, 370);
			this->infoLbl->Name = L"infoLbl";
			this->infoLbl->Size = System::Drawing::Size(484, 28);
			this->infoLbl->TabIndex = 5;
			this->infoLbl->Text = L"Naciœnij oferty aby zobaczyæ nasze auta";
			// 
			// welcomeLbl
			// 
			this->welcomeLbl->AutoSize = true;
			this->welcomeLbl->Font = (gcnew System::Drawing::Font(L"Century Gothic", 18, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->welcomeLbl->ForeColor = System::Drawing::Color::White;
			this->welcomeLbl->Location = System::Drawing::Point(432, 320);
			this->welcomeLbl->Name = L"welcomeLbl";
			this->welcomeLbl->Size = System::Drawing::Size(100, 28);
			this->welcomeLbl->TabIndex = 4;
			this->welcomeLbl->Text = L"Witamy";
			// 
			// pictureBox2
			// 
			this->pictureBox2->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"pictureBox2.Image")));
			this->pictureBox2->Location = System::Drawing::Point(414, 153);
			this->pictureBox2->Name = L"pictureBox2";
			this->pictureBox2->Size = System::Drawing::Size(128, 128);
			this->pictureBox2->SizeMode = System::Windows::Forms::PictureBoxSizeMode::AutoSize;
			this->pictureBox2->TabIndex = 3;
			this->pictureBox2->TabStop = false;
			// 
			// accountPanel
			// 
			this->accountPanel->Controls->Add(this->deleteUserButton);
			this->accountPanel->Controls->Add(this->CpasswordTextBox);
			this->accountPanel->Controls->Add(this->label8);
			this->accountPanel->Controls->Add(this->CloginTextBox);
			this->accountPanel->Controls->Add(this->CemailTextBox);
			this->accountPanel->Controls->Add(this->CidCardTextBox);
			this->accountPanel->Controls->Add(this->CphoneNoTextBox);
			this->accountPanel->Controls->Add(this->CsurnameTextBox);
			this->accountPanel->Controls->Add(this->label6);
			this->accountPanel->Controls->Add(this->label5);
			this->accountPanel->Controls->Add(this->label4);
			this->accountPanel->Controls->Add(this->label3);
			this->accountPanel->Controls->Add(this->label2);
			this->accountPanel->Controls->Add(this->label7);
			this->accountPanel->Controls->Add(this->CnameTextBox);
			this->accountPanel->Controls->Add(this->acceptChangeButton);
			this->accountPanel->Controls->Add(this->changeDataButton);
			this->accountPanel->Dock = System::Windows::Forms::DockStyle::Fill;
			this->accountPanel->Location = System::Drawing::Point(0, 0);
			this->accountPanel->Name = L"accountPanel";
			this->accountPanel->Size = System::Drawing::Size(956, 550);
			this->accountPanel->TabIndex = 3;
			// 
			// deleteUserButton
			// 
			this->deleteUserButton->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)),
				static_cast<System::Int32>(static_cast<System::Byte>(87)), static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->deleteUserButton->FlatAppearance->BorderSize = 0;
			this->deleteUserButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->deleteUserButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->deleteUserButton->Location = System::Drawing::Point(819, 6);
			this->deleteUserButton->Name = L"deleteUserButton";
			this->deleteUserButton->Size = System::Drawing::Size(134, 28);
			this->deleteUserButton->TabIndex = 30;
			this->deleteUserButton->Text = L"Usuñ konto";
			this->deleteUserButton->UseVisualStyleBackColor = false;
			this->deleteUserButton->Click += gcnew System::EventHandler(this, &ClientForm::deleteUser);
			// 
			// CpasswordTextBox
			// 
			this->CpasswordTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->CpasswordTextBox->Enabled = false;
			this->CpasswordTextBox->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->CpasswordTextBox->Location = System::Drawing::Point(498, 340);
			this->CpasswordTextBox->MaxLength = 45;
			this->CpasswordTextBox->Name = L"CpasswordTextBox";
			this->CpasswordTextBox->Size = System::Drawing::Size(243, 20);
			this->CpasswordTextBox->TabIndex = 27;
			// 
			// label8
			// 
			this->label8->AutoSize = true;
			this->label8->ForeColor = System::Drawing::Color::White;
			this->label8->Location = System::Drawing::Point(251, 339);
			this->label8->Name = L"label8";
			this->label8->Size = System::Drawing::Size(54, 21);
			this->label8->TabIndex = 26;
			this->label8->Text = L"Has³o";
			// 
			// CloginTextBox
			// 
			this->CloginTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->CloginTextBox->Enabled = false;
			this->CloginTextBox->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->CloginTextBox->Location = System::Drawing::Point(498, 295);
			this->CloginTextBox->MaxLength = 45;
			this->CloginTextBox->Name = L"CloginTextBox";
			this->CloginTextBox->Size = System::Drawing::Size(243, 20);
			this->CloginTextBox->TabIndex = 25;
			// 
			// CemailTextBox
			// 
			this->CemailTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->CemailTextBox->Enabled = false;
			this->CemailTextBox->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->CemailTextBox->Location = System::Drawing::Point(498, 250);
			this->CemailTextBox->MaxLength = 45;
			this->CemailTextBox->Name = L"CemailTextBox";
			this->CemailTextBox->Size = System::Drawing::Size(243, 20);
			this->CemailTextBox->TabIndex = 24;
			// 
			// CidCardTextBox
			// 
			this->CidCardTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->CidCardTextBox->Enabled = false;
			this->CidCardTextBox->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->CidCardTextBox->Location = System::Drawing::Point(498, 205);
			this->CidCardTextBox->MaxLength = 45;
			this->CidCardTextBox->Name = L"CidCardTextBox";
			this->CidCardTextBox->Size = System::Drawing::Size(243, 20);
			this->CidCardTextBox->TabIndex = 23;
			// 
			// CphoneNoTextBox
			// 
			this->CphoneNoTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->CphoneNoTextBox->Enabled = false;
			this->CphoneNoTextBox->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->CphoneNoTextBox->Location = System::Drawing::Point(498, 160);
			this->CphoneNoTextBox->MaxLength = 45;
			this->CphoneNoTextBox->Name = L"CphoneNoTextBox";
			this->CphoneNoTextBox->Size = System::Drawing::Size(243, 20);
			this->CphoneNoTextBox->TabIndex = 22;
			// 
			// CsurnameTextBox
			// 
			this->CsurnameTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->CsurnameTextBox->Enabled = false;
			this->CsurnameTextBox->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->CsurnameTextBox->Location = System::Drawing::Point(498, 115);
			this->CsurnameTextBox->MaxLength = 45;
			this->CsurnameTextBox->Name = L"CsurnameTextBox";
			this->CsurnameTextBox->Size = System::Drawing::Size(243, 20);
			this->CsurnameTextBox->TabIndex = 21;
			// 
			// label6
			// 
			this->label6->AutoSize = true;
			this->label6->ForeColor = System::Drawing::Color::White;
			this->label6->Location = System::Drawing::Point(251, 294);
			this->label6->Name = L"label6";
			this->label6->Size = System::Drawing::Size(51, 21);
			this->label6->TabIndex = 20;
			this->label6->Text = L"Login";
			// 
			// label5
			// 
			this->label5->AutoSize = true;
			this->label5->ForeColor = System::Drawing::Color::White;
			this->label5->Location = System::Drawing::Point(251, 249);
			this->label5->Name = L"label5";
			this->label5->Size = System::Drawing::Size(101, 21);
			this->label5->TabIndex = 19;
			this->label5->Text = L"Adres email";
			// 
			// label4
			// 
			this->label4->AutoSize = true;
			this->label4->ForeColor = System::Drawing::Color::White;
			this->label4->Location = System::Drawing::Point(251, 204);
			this->label4->Name = L"label4";
			this->label4->Size = System::Drawing::Size(185, 21);
			this->label4->TabIndex = 18;
			this->label4->Text = L"Nr dowodu osobistego";
			// 
			// label3
			// 
			this->label3->AutoSize = true;
			this->label3->ForeColor = System::Drawing::Color::White;
			this->label3->Location = System::Drawing::Point(251, 159);
			this->label3->Name = L"label3";
			this->label3->Size = System::Drawing::Size(96, 21);
			this->label3->TabIndex = 17;
			this->label3->Text = L"Nr telefonu";
			// 
			// label2
			// 
			this->label2->AutoSize = true;
			this->label2->ForeColor = System::Drawing::Color::White;
			this->label2->Location = System::Drawing::Point(251, 114);
			this->label2->Name = L"label2";
			this->label2->Size = System::Drawing::Size(81, 21);
			this->label2->TabIndex = 16;
			this->label2->Text = L"Nazwisko";
			// 
			// label7
			// 
			this->label7->AutoSize = true;
			this->label7->ForeColor = System::Drawing::Color::White;
			this->label7->Location = System::Drawing::Point(251, 69);
			this->label7->Name = L"label7";
			this->label7->Size = System::Drawing::Size(43, 21);
			this->label7->TabIndex = 15;
			this->label7->Text = L"Imiê";
			// 
			// CnameTextBox
			// 
			this->CnameTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->CnameTextBox->Enabled = false;
			this->CnameTextBox->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->CnameTextBox->Location = System::Drawing::Point(498, 70);
			this->CnameTextBox->MaxLength = 45;
			this->CnameTextBox->Name = L"CnameTextBox";
			this->CnameTextBox->Size = System::Drawing::Size(243, 20);
			this->CnameTextBox->TabIndex = 14;
			// 
			// acceptChangeButton
			// 
			this->acceptChangeButton->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)),
				static_cast<System::Int32>(static_cast<System::Byte>(87)), static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->acceptChangeButton->FlatAppearance->BorderSize = 0;
			this->acceptChangeButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->acceptChangeButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->acceptChangeButton->Location = System::Drawing::Point(255, 399);
			this->acceptChangeButton->Name = L"acceptChangeButton";
			this->acceptChangeButton->Size = System::Drawing::Size(486, 28);
			this->acceptChangeButton->TabIndex = 29;
			this->acceptChangeButton->Text = L"Zapisz zmiany";
			this->acceptChangeButton->UseVisualStyleBackColor = false;
			this->acceptChangeButton->Visible = false;
			this->acceptChangeButton->Click += gcnew System::EventHandler(this, &ClientForm::acceptChangeButton_Click);
			// 
			// changeDataButton
			// 
			this->changeDataButton->BackColor = System::Drawing::Color::White;
			this->changeDataButton->FlatAppearance->BorderSize = 0;
			this->changeDataButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->changeDataButton->Location = System::Drawing::Point(255, 399);
			this->changeDataButton->Name = L"changeDataButton";
			this->changeDataButton->Size = System::Drawing::Size(486, 28);
			this->changeDataButton->TabIndex = 28;
			this->changeDataButton->Text = L"Zmieñ dane";
			this->changeDataButton->UseVisualStyleBackColor = false;
			this->changeDataButton->Click += gcnew System::EventHandler(this, &ClientForm::changeDataButton_Click);
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
			this->infoPanel->Size = System::Drawing::Size(956, 550);
			this->infoPanel->TabIndex = 6;
			// 
			// offerDetailsPanel
			// 
			this->offerDetailsPanel->Controls->Add(this->makeOrderButton);
			this->offerDetailsPanel->Controls->Add(this->discountTextBox);
			this->offerDetailsPanel->Controls->Add(this->label27);
			this->offerDetailsPanel->Controls->Add(this->calculateButton);
			this->offerDetailsPanel->Controls->Add(this->priceSum);
			this->offerDetailsPanel->Controls->Add(this->label26);
			this->offerDetailsPanel->Controls->Add(this->dateOfReturnPicker);
			this->offerDetailsPanel->Controls->Add(this->label25);
			this->offerDetailsPanel->Controls->Add(this->label24);
			this->offerDetailsPanel->Controls->Add(this->dateOfPurchasePicker);
			this->offerDetailsPanel->Controls->Add(this->offerDetailsPrice);
			this->offerDetailsPanel->Controls->Add(this->label23);
			this->offerDetailsPanel->Controls->Add(this->goBackButton);
			this->offerDetailsPanel->Controls->Add(this->offerDetailsNumberPlate);
			this->offerDetailsPanel->Controls->Add(this->offerDetailsGearboxType);
			this->offerDetailsPanel->Controls->Add(this->offerDetailsFuelType);
			this->offerDetailsPanel->Controls->Add(this->offerDetailsPowerhorse);
			this->offerDetailsPanel->Controls->Add(this->offerDetailsCapacity);
			this->offerDetailsPanel->Controls->Add(this->offerDetailsMilleage);
			this->offerDetailsPanel->Controls->Add(this->offerDetailsProduction);
			this->offerDetailsPanel->Controls->Add(this->offerDetailsModel);
			this->offerDetailsPanel->Controls->Add(this->offerDetailsBrand);
			this->offerDetailsPanel->Controls->Add(this->label18);
			this->offerDetailsPanel->Controls->Add(this->label17);
			this->offerDetailsPanel->Controls->Add(this->label16);
			this->offerDetailsPanel->Controls->Add(this->label15);
			this->offerDetailsPanel->Controls->Add(this->label14);
			this->offerDetailsPanel->Controls->Add(this->label19);
			this->offerDetailsPanel->Controls->Add(this->label20);
			this->offerDetailsPanel->Controls->Add(this->label21);
			this->offerDetailsPanel->Controls->Add(this->label22);
			this->offerDetailsPanel->Dock = System::Windows::Forms::DockStyle::Fill;
			this->offerDetailsPanel->Location = System::Drawing::Point(0, 0);
			this->offerDetailsPanel->Name = L"offerDetailsPanel";
			this->offerDetailsPanel->Size = System::Drawing::Size(956, 550);
			this->offerDetailsPanel->TabIndex = 6;
			// 
			// makeOrderButton
			// 
			this->makeOrderButton->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)), static_cast<System::Int32>(static_cast<System::Byte>(87)),
				static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->makeOrderButton->FlatAppearance->BorderSize = 0;
			this->makeOrderButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->makeOrderButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->makeOrderButton->ForeColor = System::Drawing::Color::White;
			this->makeOrderButton->Location = System::Drawing::Point(484, 322);
			this->makeOrderButton->Name = L"makeOrderButton";
			this->makeOrderButton->Size = System::Drawing::Size(236, 26);
			this->makeOrderButton->TabIndex = 47;
			this->makeOrderButton->Text = L"Zamawiam";
			this->makeOrderButton->UseVisualStyleBackColor = false;
			this->makeOrderButton->Click += gcnew System::EventHandler(this, &ClientForm::makeOrder);
			// 
			// discountTextBox
			// 
			this->discountTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->discountTextBox->Location = System::Drawing::Point(620, 270);
			this->discountTextBox->Name = L"discountTextBox";
			this->discountTextBox->Size = System::Drawing::Size(100, 20);
			this->discountTextBox->TabIndex = 46;
			// 
			// label27
			// 
			this->label27->AutoSize = true;
			this->label27->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label27->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label27->ForeColor = System::Drawing::Color::White;
			this->label27->Location = System::Drawing::Point(480, 271);
			this->label27->Name = L"label27";
			this->label27->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label27->Size = System::Drawing::Size(102, 19);
			this->label27->TabIndex = 45;
			this->label27->Text = L"Targuj upust";
			// 
			// calculateButton
			// 
			this->calculateButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->calculateButton->ForeColor = System::Drawing::Color::White;
			this->calculateButton->Location = System::Drawing::Point(645, 214);
			this->calculateButton->Name = L"calculateButton";
			this->calculateButton->Size = System::Drawing::Size(75, 28);
			this->calculateButton->TabIndex = 44;
			this->calculateButton->Text = L"Przelicz";
			this->calculateButton->UseVisualStyleBackColor = true;
			this->calculateButton->Click += gcnew System::EventHandler(this, &ClientForm::calculateButton_Click);
			// 
			// priceSum
			// 
			this->priceSum->AutoSize = true;
			this->priceSum->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->priceSum->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->priceSum->ForeColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)), static_cast<System::Int32>(static_cast<System::Byte>(87)),
				static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->priceSum->Location = System::Drawing::Point(564, 217);
			this->priceSum->Name = L"priceSum";
			this->priceSum->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->priceSum->Size = System::Drawing::Size(19, 21);
			this->priceSum->TabIndex = 43;
			this->priceSum->Text = L"0";
			// 
			// label26
			// 
			this->label26->AutoSize = true;
			this->label26->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label26->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label26->ForeColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)), static_cast<System::Int32>(static_cast<System::Byte>(87)),
				static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->label26->Location = System::Drawing::Point(480, 216);
			this->label26->Name = L"label26";
			this->label26->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label26->Size = System::Drawing::Size(54, 19);
			this->label26->TabIndex = 42;
			this->label26->Text = L"Suma";
			// 
			// dateOfReturnPicker
			// 
			this->dateOfReturnPicker->Location = System::Drawing::Point(484, 158);
			this->dateOfReturnPicker->Name = L"dateOfReturnPicker";
			this->dateOfReturnPicker->Size = System::Drawing::Size(236, 27);
			this->dateOfReturnPicker->TabIndex = 41;
			// 
			// label25
			// 
			this->label25->AutoSize = true;
			this->label25->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label25->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label25->ForeColor = System::Drawing::Color::White;
			this->label25->Location = System::Drawing::Point(594, 131);
			this->label25->Name = L"label25";
			this->label25->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label25->Size = System::Drawing::Size(30, 19);
			this->label25->TabIndex = 40;
			this->label25->Text = L"Do";
			// 
			// label24
			// 
			this->label24->AutoSize = true;
			this->label24->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label24->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label24->ForeColor = System::Drawing::Color::White;
			this->label24->Location = System::Drawing::Point(594, 48);
			this->label24->Name = L"label24";
			this->label24->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label24->Size = System::Drawing::Size(33, 19);
			this->label24->TabIndex = 39;
			this->label24->Text = L"Od";
			// 
			// dateOfPurchasePicker
			// 
			this->dateOfPurchasePicker->Location = System::Drawing::Point(484, 83);
			this->dateOfPurchasePicker->Name = L"dateOfPurchasePicker";
			this->dateOfPurchasePicker->Size = System::Drawing::Size(236, 27);
			this->dateOfPurchasePicker->TabIndex = 38;
			// 
			// offerDetailsPrice
			// 
			this->offerDetailsPrice->AutoSize = true;
			this->offerDetailsPrice->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->offerDetailsPrice->ForeColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)),
				static_cast<System::Int32>(static_cast<System::Byte>(87)), static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->offerDetailsPrice->Location = System::Drawing::Point(275, 460);
			this->offerDetailsPrice->Name = L"offerDetailsPrice";
			this->offerDetailsPrice->Size = System::Drawing::Size(67, 19);
			this->offerDetailsPrice->TabIndex = 37;
			this->offerDetailsPrice->Text = L"label23";
			// 
			// label23
			// 
			this->label23->AutoSize = true;
			this->label23->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label23->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label23->ForeColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)), static_cast<System::Int32>(static_cast<System::Byte>(87)),
				static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->label23->Location = System::Drawing::Point(30, 460);
			this->label23->Name = L"label23";
			this->label23->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label23->Size = System::Drawing::Size(120, 19);
			this->label23->TabIndex = 36;
			this->label23->Text = L"Cena za dzieñ";
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
			this->goBackButton->Location = System::Drawing::Point(868, 6);
			this->goBackButton->Name = L"goBackButton";
			this->goBackButton->Size = System::Drawing::Size(76, 52);
			this->goBackButton->TabIndex = 35;
			this->goBackButton->TextAlign = System::Drawing::ContentAlignment::MiddleRight;
			this->goBackButton->UseVisualStyleBackColor = false;
			this->goBackButton->Click += gcnew System::EventHandler(this, &ClientForm::goBackButton_Click);
			// 
			// offerDetailsNumberPlate
			// 
			this->offerDetailsNumberPlate->AutoSize = true;
			this->offerDetailsNumberPlate->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Italic, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->offerDetailsNumberPlate->ForeColor = System::Drawing::Color::White;
			this->offerDetailsNumberPlate->Location = System::Drawing::Point(274, 418);
			this->offerDetailsNumberPlate->Name = L"offerDetailsNumberPlate";
			this->offerDetailsNumberPlate->Size = System::Drawing::Size(67, 19);
			this->offerDetailsNumberPlate->TabIndex = 34;
			this->offerDetailsNumberPlate->Text = L"label23";
			// 
			// offerDetailsGearboxType
			// 
			this->offerDetailsGearboxType->AutoSize = true;
			this->offerDetailsGearboxType->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Italic, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->offerDetailsGearboxType->ForeColor = System::Drawing::Color::White;
			this->offerDetailsGearboxType->Location = System::Drawing::Point(274, 371);
			this->offerDetailsGearboxType->Name = L"offerDetailsGearboxType";
			this->offerDetailsGearboxType->Size = System::Drawing::Size(67, 19);
			this->offerDetailsGearboxType->TabIndex = 33;
			this->offerDetailsGearboxType->Text = L"label23";
			// 
			// offerDetailsFuelType
			// 
			this->offerDetailsFuelType->AutoSize = true;
			this->offerDetailsFuelType->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Italic, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->offerDetailsFuelType->ForeColor = System::Drawing::Color::White;
			this->offerDetailsFuelType->Location = System::Drawing::Point(274, 328);
			this->offerDetailsFuelType->Name = L"offerDetailsFuelType";
			this->offerDetailsFuelType->Size = System::Drawing::Size(67, 19);
			this->offerDetailsFuelType->TabIndex = 32;
			this->offerDetailsFuelType->Text = L"label23";
			// 
			// offerDetailsPowerhorse
			// 
			this->offerDetailsPowerhorse->AutoSize = true;
			this->offerDetailsPowerhorse->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Italic, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->offerDetailsPowerhorse->ForeColor = System::Drawing::Color::White;
			this->offerDetailsPowerhorse->Location = System::Drawing::Point(274, 277);
			this->offerDetailsPowerhorse->Name = L"offerDetailsPowerhorse";
			this->offerDetailsPowerhorse->Size = System::Drawing::Size(67, 19);
			this->offerDetailsPowerhorse->TabIndex = 31;
			this->offerDetailsPowerhorse->Text = L"label23";
			// 
			// offerDetailsCapacity
			// 
			this->offerDetailsCapacity->AutoSize = true;
			this->offerDetailsCapacity->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Italic, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->offerDetailsCapacity->ForeColor = System::Drawing::Color::White;
			this->offerDetailsCapacity->Location = System::Drawing::Point(275, 230);
			this->offerDetailsCapacity->Name = L"offerDetailsCapacity";
			this->offerDetailsCapacity->Size = System::Drawing::Size(67, 19);
			this->offerDetailsCapacity->TabIndex = 30;
			this->offerDetailsCapacity->Text = L"label23";
			// 
			// offerDetailsMilleage
			// 
			this->offerDetailsMilleage->AutoSize = true;
			this->offerDetailsMilleage->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Italic, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->offerDetailsMilleage->ForeColor = System::Drawing::Color::White;
			this->offerDetailsMilleage->Location = System::Drawing::Point(274, 186);
			this->offerDetailsMilleage->Name = L"offerDetailsMilleage";
			this->offerDetailsMilleage->Size = System::Drawing::Size(67, 19);
			this->offerDetailsMilleage->TabIndex = 29;
			this->offerDetailsMilleage->Text = L"label23";
			// 
			// offerDetailsProduction
			// 
			this->offerDetailsProduction->AutoSize = true;
			this->offerDetailsProduction->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Italic, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->offerDetailsProduction->ForeColor = System::Drawing::Color::White;
			this->offerDetailsProduction->Location = System::Drawing::Point(275, 136);
			this->offerDetailsProduction->Name = L"offerDetailsProduction";
			this->offerDetailsProduction->Size = System::Drawing::Size(67, 19);
			this->offerDetailsProduction->TabIndex = 28;
			this->offerDetailsProduction->Text = L"label23";
			// 
			// offerDetailsModel
			// 
			this->offerDetailsModel->AutoSize = true;
			this->offerDetailsModel->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Italic, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->offerDetailsModel->ForeColor = System::Drawing::Color::White;
			this->offerDetailsModel->Location = System::Drawing::Point(275, 89);
			this->offerDetailsModel->Name = L"offerDetailsModel";
			this->offerDetailsModel->Size = System::Drawing::Size(67, 19);
			this->offerDetailsModel->TabIndex = 27;
			this->offerDetailsModel->Text = L"label23";
			// 
			// offerDetailsBrand
			// 
			this->offerDetailsBrand->AutoSize = true;
			this->offerDetailsBrand->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Italic, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->offerDetailsBrand->ForeColor = System::Drawing::Color::White;
			this->offerDetailsBrand->Location = System::Drawing::Point(275, 51);
			this->offerDetailsBrand->Name = L"offerDetailsBrand";
			this->offerDetailsBrand->Size = System::Drawing::Size(67, 19);
			this->offerDetailsBrand->TabIndex = 26;
			this->offerDetailsBrand->Text = L"label23";
			// 
			// label18
			// 
			this->label18->AutoSize = true;
			this->label18->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label18->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label18->ForeColor = System::Drawing::Color::White;
			this->label18->Location = System::Drawing::Point(30, 418);
			this->label18->Name = L"label18";
			this->label18->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label18->Size = System::Drawing::Size(127, 19);
			this->label18->TabIndex = 25;
			this->label18->Text = L"Nr rejestracyjny";
			// 
			// label17
			// 
			this->label17->AutoSize = true;
			this->label17->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label17->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label17->ForeColor = System::Drawing::Color::White;
			this->label17->Location = System::Drawing::Point(30, 371);
			this->label17->Name = L"label17";
			this->label17->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label17->Size = System::Drawing::Size(90, 19);
			this->label17->TabIndex = 24;
			this->label17->Text = L"Typ skrzyni";
			// 
			// label16
			// 
			this->label16->AutoSize = true;
			this->label16->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label16->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label16->ForeColor = System::Drawing::Color::White;
			this->label16->Location = System::Drawing::Point(30, 324);
			this->label16->Name = L"label16";
			this->label16->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label16->Size = System::Drawing::Size(94, 19);
			this->label16->TabIndex = 23;
			this->label16->Text = L"Typ paliwa";
			// 
			// label15
			// 
			this->label15->AutoSize = true;
			this->label15->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label15->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label15->ForeColor = System::Drawing::Color::White;
			this->label15->Location = System::Drawing::Point(30, 277);
			this->label15->Name = L"label15";
			this->label15->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label15->Size = System::Drawing::Size(33, 19);
			this->label15->TabIndex = 22;
			this->label15->Text = L"KM";
			// 
			// label14
			// 
			this->label14->AutoSize = true;
			this->label14->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label14->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label14->ForeColor = System::Drawing::Color::White;
			this->label14->Location = System::Drawing::Point(30, 230);
			this->label14->Name = L"label14";
			this->label14->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label14->Size = System::Drawing::Size(175, 19);
			this->label14->TabIndex = 21;
			this->label14->Text = L"Pojemnoœæ (w litrach)";
			// 
			// label19
			// 
			this->label19->AutoSize = true;
			this->label19->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label19->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label19->ForeColor = System::Drawing::Color::White;
			this->label19->Location = System::Drawing::Point(30, 183);
			this->label19->Name = L"label19";
			this->label19->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label19->Size = System::Drawing::Size(117, 19);
			this->label19->TabIndex = 20;
			this->label19->Text = L"Przebieg (km)";
			// 
			// label20
			// 
			this->label20->AutoSize = true;
			this->label20->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label20->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label20->ForeColor = System::Drawing::Color::White;
			this->label20->Location = System::Drawing::Point(30, 136);
			this->label20->Name = L"label20";
			this->label20->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label20->Size = System::Drawing::Size(115, 19);
			this->label20->TabIndex = 19;
			this->label20->Text = L"Rok produkcji";
			// 
			// label21
			// 
			this->label21->AutoSize = true;
			this->label21->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label21->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label21->ForeColor = System::Drawing::Color::White;
			this->label21->Location = System::Drawing::Point(30, 89);
			this->label21->Name = L"label21";
			this->label21->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label21->Size = System::Drawing::Size(58, 19);
			this->label21->TabIndex = 18;
			this->label21->Text = L"Model";
			// 
			// label22
			// 
			this->label22->AutoSize = true;
			this->label22->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label22->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label22->ForeColor = System::Drawing::Color::White;
			this->label22->Location = System::Drawing::Point(30, 42);
			this->label22->Name = L"label22";
			this->label22->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label22->Size = System::Drawing::Size(59, 19);
			this->label22->TabIndex = 17;
			this->label22->Text = L"Marka";
			// 
			// orderDetailsPanel
			// 
			this->orderDetailsPanel->Controls->Add(this->goBackButton2);
			this->orderDetailsPanel->Controls->Add(this->orderDetailsPriceStrikeout);
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
			this->orderDetailsPanel->Controls->Add(this->label28);
			this->orderDetailsPanel->Controls->Add(this->label29);
			this->orderDetailsPanel->Controls->Add(this->label30);
			this->orderDetailsPanel->Controls->Add(this->label31);
			this->orderDetailsPanel->Controls->Add(this->label32);
			this->orderDetailsPanel->Controls->Add(this->label33);
			this->orderDetailsPanel->Controls->Add(this->label34);
			this->orderDetailsPanel->Controls->Add(this->label35);
			this->orderDetailsPanel->Controls->Add(this->label36);
			this->orderDetailsPanel->Dock = System::Windows::Forms::DockStyle::Fill;
			this->orderDetailsPanel->Location = System::Drawing::Point(0, 0);
			this->orderDetailsPanel->Name = L"orderDetailsPanel";
			this->orderDetailsPanel->Size = System::Drawing::Size(956, 550);
			this->orderDetailsPanel->TabIndex = 6;
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
			this->goBackButton2->Location = System::Drawing::Point(868, 9);
			this->goBackButton2->Name = L"goBackButton2";
			this->goBackButton2->Size = System::Drawing::Size(76, 52);
			this->goBackButton2->TabIndex = 44;
			this->goBackButton2->TextAlign = System::Drawing::ContentAlignment::MiddleRight;
			this->goBackButton2->UseVisualStyleBackColor = false;
			this->goBackButton2->Click += gcnew System::EventHandler(this, &ClientForm::goBackButton2_Click);
			// 
			// orderDetailsPriceStrikeout
			// 
			this->orderDetailsPriceStrikeout->AutoSize = true;
			this->orderDetailsPriceStrikeout->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsPriceStrikeout->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Strikeout)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->orderDetailsPriceStrikeout->ForeColor = System::Drawing::Color::White;
			this->orderDetailsPriceStrikeout->Location = System::Drawing::Point(721, 151);
			this->orderDetailsPriceStrikeout->Name = L"orderDetailsPriceStrikeout";
			this->orderDetailsPriceStrikeout->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsPriceStrikeout->Size = System::Drawing::Size(33, 19);
			this->orderDetailsPriceStrikeout->TabIndex = 43;
			this->orderDetailsPriceStrikeout->Text = L"Od";
			this->orderDetailsPriceStrikeout->Visible = false;
			// 
			// orderDetailsDiscount
			// 
			this->orderDetailsDiscount->AutoSize = true;
			this->orderDetailsDiscount->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsDiscount->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsDiscount->ForeColor = System::Drawing::Color::White;
			this->orderDetailsDiscount->Location = System::Drawing::Point(633, 199);
			this->orderDetailsDiscount->Name = L"orderDetailsDiscount";
			this->orderDetailsDiscount->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsDiscount->Size = System::Drawing::Size(33, 19);
			this->orderDetailsDiscount->TabIndex = 42;
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
			this->orderDetailsPrice->Location = System::Drawing::Point(633, 151);
			this->orderDetailsPrice->Name = L"orderDetailsPrice";
			this->orderDetailsPrice->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsPrice->Size = System::Drawing::Size(33, 19);
			this->orderDetailsPrice->TabIndex = 41;
			this->orderDetailsPrice->Text = L"Od";
			// 
			// orderDetailsDayOfReturn
			// 
			this->orderDetailsDayOfReturn->AutoSize = true;
			this->orderDetailsDayOfReturn->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsDayOfReturn->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsDayOfReturn->ForeColor = System::Drawing::Color::White;
			this->orderDetailsDayOfReturn->Location = System::Drawing::Point(633, 106);
			this->orderDetailsDayOfReturn->Name = L"orderDetailsDayOfReturn";
			this->orderDetailsDayOfReturn->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsDayOfReturn->Size = System::Drawing::Size(33, 19);
			this->orderDetailsDayOfReturn->TabIndex = 40;
			this->orderDetailsDayOfReturn->Text = L"Od";
			// 
			// orderDetailsDayOfPurchase
			// 
			this->orderDetailsDayOfPurchase->AutoSize = true;
			this->orderDetailsDayOfPurchase->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsDayOfPurchase->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsDayOfPurchase->ForeColor = System::Drawing::Color::White;
			this->orderDetailsDayOfPurchase->Location = System::Drawing::Point(633, 62);
			this->orderDetailsDayOfPurchase->Name = L"orderDetailsDayOfPurchase";
			this->orderDetailsDayOfPurchase->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsDayOfPurchase->Size = System::Drawing::Size(33, 19);
			this->orderDetailsDayOfPurchase->TabIndex = 39;
			this->orderDetailsDayOfPurchase->Text = L"Od";
			// 
			// label40
			// 
			this->label40->AutoSize = true;
			this->label40->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label40->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label40->ForeColor = System::Drawing::Color::White;
			this->label40->Location = System::Drawing::Point(517, 199);
			this->label40->Name = L"label40";
			this->label40->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label40->Size = System::Drawing::Size(50, 19);
			this->label40->TabIndex = 38;
			this->label40->Text = L"Upust";
			// 
			// label39
			// 
			this->label39->AutoSize = true;
			this->label39->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label39->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label39->ForeColor = System::Drawing::Color::White;
			this->label39->Location = System::Drawing::Point(517, 151);
			this->label39->Name = L"label39";
			this->label39->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label39->Size = System::Drawing::Size(52, 19);
			this->label39->TabIndex = 37;
			this->label39->Text = L"Cena";
			// 
			// label38
			// 
			this->label38->AutoSize = true;
			this->label38->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label38->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label38->ForeColor = System::Drawing::Color::White;
			this->label38->Location = System::Drawing::Point(517, 106);
			this->label38->Name = L"label38";
			this->label38->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label38->Size = System::Drawing::Size(30, 19);
			this->label38->TabIndex = 36;
			this->label38->Text = L"Do";
			// 
			// label37
			// 
			this->label37->AutoSize = true;
			this->label37->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label37->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label37->ForeColor = System::Drawing::Color::White;
			this->label37->Location = System::Drawing::Point(517, 61);
			this->label37->Name = L"label37";
			this->label37->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label37->Size = System::Drawing::Size(33, 19);
			this->label37->TabIndex = 35;
			this->label37->Text = L"Od";
			// 
			// orderDetailsNumberPlate
			// 
			this->orderDetailsNumberPlate->AutoSize = true;
			this->orderDetailsNumberPlate->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsNumberPlate->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsNumberPlate->ForeColor = System::Drawing::Color::White;
			this->orderDetailsNumberPlate->Location = System::Drawing::Point(275, 437);
			this->orderDetailsNumberPlate->Name = L"orderDetailsNumberPlate";
			this->orderDetailsNumberPlate->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsNumberPlate->Size = System::Drawing::Size(59, 19);
			this->orderDetailsNumberPlate->TabIndex = 34;
			this->orderDetailsNumberPlate->Text = L"Marka";
			// 
			// orderDetailsGearboxType
			// 
			this->orderDetailsGearboxType->AutoSize = true;
			this->orderDetailsGearboxType->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsGearboxType->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsGearboxType->ForeColor = System::Drawing::Color::White;
			this->orderDetailsGearboxType->Location = System::Drawing::Point(275, 390);
			this->orderDetailsGearboxType->Name = L"orderDetailsGearboxType";
			this->orderDetailsGearboxType->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsGearboxType->Size = System::Drawing::Size(59, 19);
			this->orderDetailsGearboxType->TabIndex = 33;
			this->orderDetailsGearboxType->Text = L"Marka";
			// 
			// orderDetailsFuelType
			// 
			this->orderDetailsFuelType->AutoSize = true;
			this->orderDetailsFuelType->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsFuelType->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsFuelType->ForeColor = System::Drawing::Color::White;
			this->orderDetailsFuelType->Location = System::Drawing::Point(277, 343);
			this->orderDetailsFuelType->Name = L"orderDetailsFuelType";
			this->orderDetailsFuelType->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsFuelType->Size = System::Drawing::Size(59, 19);
			this->orderDetailsFuelType->TabIndex = 32;
			this->orderDetailsFuelType->Text = L"Marka";
			// 
			// orderDetailsPowerhorse
			// 
			this->orderDetailsPowerhorse->AutoSize = true;
			this->orderDetailsPowerhorse->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsPowerhorse->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsPowerhorse->ForeColor = System::Drawing::Color::White;
			this->orderDetailsPowerhorse->Location = System::Drawing::Point(275, 296);
			this->orderDetailsPowerhorse->Name = L"orderDetailsPowerhorse";
			this->orderDetailsPowerhorse->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsPowerhorse->Size = System::Drawing::Size(59, 19);
			this->orderDetailsPowerhorse->TabIndex = 31;
			this->orderDetailsPowerhorse->Text = L"Marka";
			// 
			// orderDetailsCapacity
			// 
			this->orderDetailsCapacity->AutoSize = true;
			this->orderDetailsCapacity->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsCapacity->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsCapacity->ForeColor = System::Drawing::Color::White;
			this->orderDetailsCapacity->Location = System::Drawing::Point(275, 246);
			this->orderDetailsCapacity->Name = L"orderDetailsCapacity";
			this->orderDetailsCapacity->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsCapacity->Size = System::Drawing::Size(59, 19);
			this->orderDetailsCapacity->TabIndex = 30;
			this->orderDetailsCapacity->Text = L"Marka";
			// 
			// orderDetailsMilleage
			// 
			this->orderDetailsMilleage->AutoSize = true;
			this->orderDetailsMilleage->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsMilleage->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsMilleage->ForeColor = System::Drawing::Color::White;
			this->orderDetailsMilleage->Location = System::Drawing::Point(275, 199);
			this->orderDetailsMilleage->Name = L"orderDetailsMilleage";
			this->orderDetailsMilleage->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsMilleage->Size = System::Drawing::Size(59, 19);
			this->orderDetailsMilleage->TabIndex = 29;
			this->orderDetailsMilleage->Text = L"Marka";
			// 
			// orderDetailsProduction
			// 
			this->orderDetailsProduction->AutoSize = true;
			this->orderDetailsProduction->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsProduction->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsProduction->ForeColor = System::Drawing::Color::White;
			this->orderDetailsProduction->Location = System::Drawing::Point(275, 152);
			this->orderDetailsProduction->Name = L"orderDetailsProduction";
			this->orderDetailsProduction->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsProduction->Size = System::Drawing::Size(59, 19);
			this->orderDetailsProduction->TabIndex = 28;
			this->orderDetailsProduction->Text = L"Marka";
			// 
			// orderDetailsModel
			// 
			this->orderDetailsModel->AutoSize = true;
			this->orderDetailsModel->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsModel->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsModel->ForeColor = System::Drawing::Color::White;
			this->orderDetailsModel->Location = System::Drawing::Point(275, 104);
			this->orderDetailsModel->Name = L"orderDetailsModel";
			this->orderDetailsModel->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsModel->Size = System::Drawing::Size(59, 19);
			this->orderDetailsModel->TabIndex = 27;
			this->orderDetailsModel->Text = L"Marka";
			// 
			// orderDetailsBrand
			// 
			this->orderDetailsBrand->AutoSize = true;
			this->orderDetailsBrand->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->orderDetailsBrand->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->orderDetailsBrand->ForeColor = System::Drawing::Color::White;
			this->orderDetailsBrand->Location = System::Drawing::Point(275, 58);
			this->orderDetailsBrand->Name = L"orderDetailsBrand";
			this->orderDetailsBrand->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->orderDetailsBrand->Size = System::Drawing::Size(59, 19);
			this->orderDetailsBrand->TabIndex = 26;
			this->orderDetailsBrand->Text = L"Marka";
			// 
			// label28
			// 
			this->label28->AutoSize = true;
			this->label28->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label28->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label28->ForeColor = System::Drawing::Color::White;
			this->label28->Location = System::Drawing::Point(61, 434);
			this->label28->Name = L"label28";
			this->label28->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label28->Size = System::Drawing::Size(127, 19);
			this->label28->TabIndex = 25;
			this->label28->Text = L"Nr rejestracyjny";
			// 
			// label29
			// 
			this->label29->AutoSize = true;
			this->label29->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label29->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label29->ForeColor = System::Drawing::Color::White;
			this->label29->Location = System::Drawing::Point(61, 387);
			this->label29->Name = L"label29";
			this->label29->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label29->Size = System::Drawing::Size(90, 19);
			this->label29->TabIndex = 24;
			this->label29->Text = L"Typ skrzyni";
			// 
			// label30
			// 
			this->label30->AutoSize = true;
			this->label30->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label30->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label30->ForeColor = System::Drawing::Color::White;
			this->label30->Location = System::Drawing::Point(61, 340);
			this->label30->Name = L"label30";
			this->label30->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label30->Size = System::Drawing::Size(94, 19);
			this->label30->TabIndex = 23;
			this->label30->Text = L"Typ paliwa";
			// 
			// label31
			// 
			this->label31->AutoSize = true;
			this->label31->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label31->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label31->ForeColor = System::Drawing::Color::White;
			this->label31->Location = System::Drawing::Point(61, 293);
			this->label31->Name = L"label31";
			this->label31->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label31->Size = System::Drawing::Size(33, 19);
			this->label31->TabIndex = 22;
			this->label31->Text = L"KM";
			// 
			// label32
			// 
			this->label32->AutoSize = true;
			this->label32->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label32->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label32->ForeColor = System::Drawing::Color::White;
			this->label32->Location = System::Drawing::Point(61, 246);
			this->label32->Name = L"label32";
			this->label32->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label32->Size = System::Drawing::Size(175, 19);
			this->label32->TabIndex = 21;
			this->label32->Text = L"Pojemnoœæ (w litrach)";
			// 
			// label33
			// 
			this->label33->AutoSize = true;
			this->label33->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label33->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label33->ForeColor = System::Drawing::Color::White;
			this->label33->Location = System::Drawing::Point(61, 199);
			this->label33->Name = L"label33";
			this->label33->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label33->Size = System::Drawing::Size(117, 19);
			this->label33->TabIndex = 20;
			this->label33->Text = L"Przebieg (km)";
			// 
			// label34
			// 
			this->label34->AutoSize = true;
			this->label34->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label34->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label34->ForeColor = System::Drawing::Color::White;
			this->label34->Location = System::Drawing::Point(61, 152);
			this->label34->Name = L"label34";
			this->label34->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label34->Size = System::Drawing::Size(115, 19);
			this->label34->TabIndex = 19;
			this->label34->Text = L"Rok produkcji";
			// 
			// label35
			// 
			this->label35->AutoSize = true;
			this->label35->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label35->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label35->ForeColor = System::Drawing::Color::White;
			this->label35->Location = System::Drawing::Point(61, 105);
			this->label35->Name = L"label35";
			this->label35->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label35->Size = System::Drawing::Size(58, 19);
			this->label35->TabIndex = 18;
			this->label35->Text = L"Model";
			// 
			// label36
			// 
			this->label36->AutoSize = true;
			this->label36->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->label36->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label36->ForeColor = System::Drawing::Color::White;
			this->label36->Location = System::Drawing::Point(61, 58);
			this->label36->Name = L"label36";
			this->label36->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->label36->Size = System::Drawing::Size(59, 19);
			this->label36->TabIndex = 17;
			this->label36->Text = L"Marka";
			// 
			// timer1
			// 
			this->timer1->Interval = 5;
			this->timer1->Tick += gcnew System::EventHandler(this, &ClientForm::timer1_Tick);
			// 
			// label13
			// 
			this->label13->AutoSize = true;
			this->label13->Font = (gcnew System::Drawing::Font(L"Century Gothic", 6.75F, System::Drawing::FontStyle::Regular, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label13->ForeColor = System::Drawing::Color::White;
			this->label13->Location = System::Drawing::Point(320, 404);
			this->label13->Name = L"label13";
			this->label13->Size = System::Drawing::Size(347, 143);
			this->label13->TabIndex = 15;
			this->label13->Text = resources->GetString(L"label13.Text");
			// 
			// label12
			// 
			this->label12->AutoSize = true;
			this->label12->Font = (gcnew System::Drawing::Font(L"Century Gothic", 24, System::Drawing::FontStyle::Italic, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label12->ForeColor = System::Drawing::Color::White;
			this->label12->Location = System::Drawing::Point(267, 235);
			this->label12->Name = L"label12";
			this->label12->Size = System::Drawing::Size(422, 38);
			this->label12->TabIndex = 14;
			this->label12->Text = L"wiktor.pieklik@icloud.com";
			// 
			// label11
			// 
			this->label11->AutoSize = true;
			this->label11->Font = (gcnew System::Drawing::Font(L"Century Gothic", 15.75F, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->label11->ForeColor = System::Drawing::Color::White;
			this->label11->Location = System::Drawing::Point(444, 375);
			this->label11->Name = L"label11";
			this->label11->Size = System::Drawing::Size(79, 25);
			this->label11->TabIndex = 13;
			this->label11->Text = L"Grafiki";
			// 
			// label10
			// 
			this->label10->AutoSize = true;
			this->label10->Font = (gcnew System::Drawing::Font(L"Century Gothic", 26.25F, System::Drawing::FontStyle::Italic, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->label10->ForeColor = System::Drawing::Color::White;
			this->label10->Location = System::Drawing::Point(360, 189);
			this->label10->Name = L"label10";
			this->label10->Size = System::Drawing::Size(239, 42);
			this->label10->TabIndex = 12;
			this->label10->Text = L"Wiktor Pieklik";
			// 
			// label9
			// 
			this->label9->AutoSize = true;
			this->label9->Font = (gcnew System::Drawing::Font(L"Century Gothic", 36, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->label9->ForeColor = System::Drawing::Color::White;
			this->label9->Location = System::Drawing::Point(410, 100);
			this->label9->Name = L"label9";
			this->label9->Size = System::Drawing::Size(150, 58);
			this->label9->TabIndex = 11;
			this->label9->Text = L"Autor";
			// 
			// ClientForm
			// 
			this->AutoScaleMode = System::Windows::Forms::AutoScaleMode::None;
			this->ClientSize = System::Drawing::Size(1198, 620);
			this->Controls->Add(this->panel3);
			this->Controls->Add(this->slidePanel);
			this->Controls->Add(this->panel2);
			this->Controls->Add(this->panel1);
			this->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Regular, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->FormBorderStyle = System::Windows::Forms::FormBorderStyle::None;
			this->Icon = (cli::safe_cast<System::Drawing::Icon^>(resources->GetObject(L"$this.Icon")));
			this->Name = L"ClientForm";
			this->StartPosition = System::Windows::Forms::FormStartPosition::CenterScreen;
			this->Text = L"ClientForm";
			this->panel1->ResumeLayout(false);
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->pictureBox1))->EndInit();
			this->panel2->ResumeLayout(false);
			this->panel2->PerformLayout();
			this->slidePanel->ResumeLayout(false);
			this->panel3->ResumeLayout(false);
			this->offerPanel->ResumeLayout(false);
			this->offerPanel->PerformLayout();
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->pictureBox2))->EndInit();
			this->accountPanel->ResumeLayout(false);
			this->accountPanel->PerformLayout();
			this->infoPanel->ResumeLayout(false);
			this->infoPanel->PerformLayout();
			this->offerDetailsPanel->ResumeLayout(false);
			this->offerDetailsPanel->PerformLayout();
			this->orderDetailsPanel->ResumeLayout(false);
			this->orderDetailsPanel->PerformLayout();
			this->ResumeLayout(false);

		}

	private: System::Void logOut(System::Object^  sender, System::EventArgs^  e);
	private: void slidePanelEvents();
	private: System::Void timer1_Tick(System::Object^  sender, System::EventArgs^  e);
	private: System::Void displayOffers(System::Object^  sender, System::EventArgs^  e);
	private: System::Void displayOrders(System::Object^  sender, System::EventArgs^  e);
	private: System::Void accountButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void infoButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void changeDataButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void acceptChangeButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void deleteUser(System::Object^  sender, System::EventArgs^  e);
	private: void loadCarsTable();
	private: void loadOrdersTable();
	private: void orderShowButtonClick(System::Object^ sender, System::EventArgs^ e);
	private: void loadOffersTable();
	private: void showDetailOfferClick(System::Object^ sender, System::EventArgs^ e);
	private: System::Void goBackButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void calculateButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void makeOrder(System::Object^  sender, System::EventArgs^  e);
	private: System::Void goBackButton2_Click(System::Object^  sender, System::EventArgs^  e);
};
}
#endif
