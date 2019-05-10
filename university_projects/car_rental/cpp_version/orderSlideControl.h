#ifndef  orderSlideControl_h
#define orderSlideControl_h

using namespace System;
using namespace System::ComponentModel;
using namespace System::Collections;
using namespace System::Windows::Forms;
using namespace System::Data;
using namespace System::Drawing;


namespace carrental {

	/// <summary>
	/// Podsumowanie informacji o orderSlideControl
	/// </summary>
	public ref class orderSlideControl : public System::Windows::Forms::UserControl
	{
	public:
		orderSlideControl(void);

	protected:
		~orderSlideControl();
	private: System::Windows::Forms::PictureBox^  pictureBox1;
	public: System::Windows::Forms::Label^  carBrandAndModel;
	private:
	protected:

	private:

	public: System::Windows::Forms::Button^  showButton;

	public:

	public:

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
			System::ComponentModel::ComponentResourceManager^  resources = (gcnew System::ComponentModel::ComponentResourceManager(orderSlideControl::typeid));
			this->pictureBox1 = (gcnew System::Windows::Forms::PictureBox());
			this->carBrandAndModel = (gcnew System::Windows::Forms::Label());
			this->showButton = (gcnew System::Windows::Forms::Button());
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->pictureBox1))->BeginInit();
			this->SuspendLayout();
			// 
			// pictureBox1
			// 
			this->pictureBox1->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"pictureBox1.Image")));
			this->pictureBox1->Location = System::Drawing::Point(21, 31);
			this->pictureBox1->Name = L"pictureBox1";
			this->pictureBox1->Size = System::Drawing::Size(64, 64);
			this->pictureBox1->SizeMode = System::Windows::Forms::PictureBoxSizeMode::AutoSize;
			this->pictureBox1->TabIndex = 0;
			this->pictureBox1->TabStop = false;
			// 
			// carBrandAndModel
			// 
			this->carBrandAndModel->AutoSize = true;
			this->carBrandAndModel->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->carBrandAndModel->Font = (gcnew System::Drawing::Font(L"Century Gothic", 14.25F, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->carBrandAndModel->ForeColor = System::Drawing::Color::White;
			this->carBrandAndModel->Location = System::Drawing::Point(124, 31);
			this->carBrandAndModel->Name = L"carBrandAndModel";
			this->carBrandAndModel->Size = System::Drawing::Size(69, 23);
			this->carBrandAndModel->TabIndex = 1;
			this->carBrandAndModel->Text = L"label1";
			// 
			// showButton
			// 
			this->showButton->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)), static_cast<System::Int32>(static_cast<System::Byte>(87)),
				static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->showButton->FlatAppearance->BorderSize = 0;
			this->showButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->showButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->showButton->ForeColor = System::Drawing::Color::White;
			this->showButton->Location = System::Drawing::Point(128, 68);
			this->showButton->Name = L"showButton";
			this->showButton->Size = System::Drawing::Size(178, 27);
			this->showButton->TabIndex = 3;
			this->showButton->Text = L"Poka¿";
			this->showButton->UseVisualStyleBackColor = false;
			// 
			// orderSlideControl
			// 
			this->AutoScaleDimensions = System::Drawing::SizeF(10, 21);
			this->AutoScaleMode = System::Windows::Forms::AutoScaleMode::Font;
			this->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(21)), static_cast<System::Int32>(static_cast<System::Byte>(101)),
				static_cast<System::Int32>(static_cast<System::Byte>(192)));
			this->Controls->Add(this->showButton);
			this->Controls->Add(this->carBrandAndModel);
			this->Controls->Add(this->pictureBox1);
			this->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Regular, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->Margin = System::Windows::Forms::Padding(5);
			this->Name = L"orderSlideControl";
			this->Size = System::Drawing::Size(359, 125);
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->pictureBox1))->EndInit();
			this->ResumeLayout(false);
			this->PerformLayout();

		}
#pragma endregion
	};
}
#endif // ! orderSlideControl_h

