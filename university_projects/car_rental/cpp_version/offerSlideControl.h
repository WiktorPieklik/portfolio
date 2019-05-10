#ifndef offerSlideControl_h
#define offerSlideControl_h

using namespace System;
using namespace System::ComponentModel;
using namespace System::Collections;
using namespace System::Windows::Forms;
using namespace System::Data;
using namespace System::Drawing;


namespace carrental {

	/// <summary>
	/// Podsumowanie informacji o offerSlideControl
	/// </summary>
	public ref class offerSlideControl : public System::Windows::Forms::UserControl
	{
	public:
		offerSlideControl(void);

	protected:
		~offerSlideControl();
	public: System::Windows::Forms::PictureBox^  pictureBox1;
	protected:
	public: System::Windows::Forms::Label^  brandLbl;
	private:
	public: System::Windows::Forms::Label^  modelLbl;
	public: System::Windows::Forms::Button^  showButton;


	protected:

	private:
		/// <summary>
		/// Wymagana zmienna projektanta.
		/// </summary>
		System::ComponentModel::Container ^components;

#pragma region Windows Form Designer generated code
		/// <summary>
		/// Wymagana metoda obs³ugi projektanta — nie nale¿y modyfikowaæ 
		/// zawartoœæ tej metody z edytorem kodu.
		/// </summary>
		void InitializeComponent(void)
		{
			System::ComponentModel::ComponentResourceManager^  resources = (gcnew System::ComponentModel::ComponentResourceManager(offerSlideControl::typeid));
			this->pictureBox1 = (gcnew System::Windows::Forms::PictureBox());
			this->brandLbl = (gcnew System::Windows::Forms::Label());
			this->modelLbl = (gcnew System::Windows::Forms::Label());
			this->showButton = (gcnew System::Windows::Forms::Button());
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->pictureBox1))->BeginInit();
			this->SuspendLayout();
			// 
			// pictureBox1
			// 
			this->pictureBox1->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"pictureBox1.Image")));
			this->pictureBox1->Location = System::Drawing::Point(12, 3);
			this->pictureBox1->Name = L"pictureBox1";
			this->pictureBox1->Size = System::Drawing::Size(64, 64);
			this->pictureBox1->SizeMode = System::Windows::Forms::PictureBoxSizeMode::AutoSize;
			this->pictureBox1->TabIndex = 0;
			this->pictureBox1->TabStop = false;
			// 
			// brandLbl
			// 
			this->brandLbl->AutoSize = true;
			this->brandLbl->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->brandLbl->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Regular, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->brandLbl->ForeColor = System::Drawing::Color::White;
			this->brandLbl->Location = System::Drawing::Point(127, 9);
			this->brandLbl->Name = L"brandLbl";
			this->brandLbl->Size = System::Drawing::Size(57, 21);
			this->brandLbl->TabIndex = 1;
			this->brandLbl->Text = L"label1";
			// 
			// modelLbl
			// 
			this->modelLbl->AutoSize = true;
			this->modelLbl->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->modelLbl->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Regular, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->modelLbl->ForeColor = System::Drawing::Color::White;
			this->modelLbl->Location = System::Drawing::Point(127, 40);
			this->modelLbl->Name = L"modelLbl";
			this->modelLbl->Size = System::Drawing::Size(57, 21);
			this->modelLbl->TabIndex = 2;
			this->modelLbl->Text = L"label2";
			// 
			// showButton
			// 
			this->showButton->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)), static_cast<System::Int32>(static_cast<System::Byte>(87)),
				static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->showButton->FlatAppearance->BorderSize = 0;
			this->showButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->showButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 9.75F, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->showButton->ForeColor = System::Drawing::Color::White;
			this->showButton->Location = System::Drawing::Point(87, 85);
			this->showButton->Name = L"showButton";
			this->showButton->Size = System::Drawing::Size(75, 23);
			this->showButton->TabIndex = 3;
			this->showButton->Text = L"Poka¿";
			this->showButton->UseVisualStyleBackColor = false;
			// 
			// offerSlideControl
			// 
			this->AutoScaleMode = System::Windows::Forms::AutoScaleMode::None;
			this->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(33)), static_cast<System::Int32>(static_cast<System::Byte>(150)),
				static_cast<System::Int32>(static_cast<System::Byte>(243)));
			this->Controls->Add(this->showButton);
			this->Controls->Add(this->modelLbl);
			this->Controls->Add(this->brandLbl);
			this->Controls->Add(this->pictureBox1);
			this->Name = L"offerSlideControl";
			this->Size = System::Drawing::Size(241, 117);
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->pictureBox1))->EndInit();
			this->ResumeLayout(false);
			this->PerformLayout();

		}
	};
}
#endif // !offerSlideControl_h
