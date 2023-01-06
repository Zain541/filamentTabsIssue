<?php

namespace App\Http\Livewire\Tenant\Modules\Contacts\Contact\Components\SlideOver;

use App\Models\Tenant\Company;
use App\Models\Tenant\Contact;
use App\Models\Tenant\ContactSource;
use App\Models\Tenant\Lookups\Country;
use App\Models\Tenant\Module;
use App\Models\Tenant\TravelDocumentation;
use WireElements\Pro\Components\SlideOver\SlideOver;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Illuminate\Support\Facades\Auth;

class TravelDetail extends SlideOver implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public TravelDocumentation $travel_documentation;
    public Contact $contact;


    public function mount(): void
    {
        $this->travelDocumentationForm->fill();
        $this->contactForm->fill();
    }

    protected function getFormSchema(): array
    {

        return [
            Tabs::make('Heading')
                ->tabs([
                    Tabs\Tab::make('Label 1')
                        ->schema([
                            $this->getTravelDocumentationSchema()
                        ]),
                    Tabs\Tab::make('Label 2')
                        ->schema([
                            $this->getContactSchema()
                        ]),
                ])
        ];
    }

    protected function getTravelDocumentationSchema()
    {

        return [
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\MarkdownEditor::make('content'),
        ];
        
    }

    protected function getContactSchema()
    {
    

        return [
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\MarkdownEditor::make('content'),
        ];
    }

  
    protected function getForms(): array
    {
        return [
            'travelDocumentationForm' => $this->makeForm()
                ->schema($this->getTravelDocumentationSchema())
                ->model(TravelDocumentation::class),
            'contactForm' => $this->makeForm()
                ->schema($this->getContactSchema())
                ->model(Contact::class)

        ];
    }

    public static function attributes(): array
    {
        return [
            // Set the modal size to 2xl, you can choose between:
            // xs, sm, md, lg, xl, 2xl, 3xl, 4xl, 5xl, 6xl, 7xl
            'size' => '6xl',
        ];
    }

    public function render()
    {
        return view('livewire.tenant.modules.contacts.contact.components.slide-over.travel-detail');
    }
}
