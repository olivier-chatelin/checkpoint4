<?php

namespace App\DataFixtures;

use App\Entity\Template;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TemplateFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $template = new Template();
        $template->setName('classic');
        $template->setTheme('metal');
        $template->setHtml('<div id="cv" class="container classic " >
    <div class="row  " id="title">
        <h1 class="text-center fw-bold mb-0">Camille Martin</h1>
        <p class="text-center mt-0" id="header">Expert Comptable</p>
    </div>
    <div id="personal-details" class="small mt-4 border">
        <h5>Détails personnels </h5>
        <div class="d-flex justify-content-between mx-3">
            <div class="d-flex flex-column">
                <p class="fw-bold">Nom</p>
                <p class="fw-bold">Email</p>
                <p class="fw-bold">Numéro de téléphone</p>
                <p class="fw-bold">Adresse</p>
                <p class="fw-bold">LinkedIn</p>
                <p class="fw-bold">Github</p>
            </div>
            <div class="d-flex flex-column">
                <p>Camille Martin</p>
                <p>camille.martin@gmail.com</p>
                <p>06 54 84 95 95</p>
                <p>133 Avenue Thiers 33200 Bordeaux</p>
                <p>https://www.linkedin.com/feed/</p>
                <p>https://www.github.com/feed/</p>
            </div>
            <img src="https://thispersondoesnotexist.com/image" alt="" width="150px" height="150px" id="photo">
        </div>
    </div>
    <div id="profile" class="small mt-4 border">
        <h5>Profil</h5>
        <p class="small mx-3">
            Actuellement Chef comptable, et fort de 10 ans d expérience je recherche un cabinet qui pourra m apporter épanouissement
        </p>
    </div>
    <div id="skills" class="small mt-4 border">
        <h5>Compétences</h5>
        <div class="flex mx-3">
            <p class="fw-bold">PHP</p>
            <p class="fw-bold">JS</p>
            <p class="fw-bold">Bootstrap</p>
        </div>
    </div>
    <div id="experience" class="small mt-4 border">
        <h5>Expérience professionnelle</h5>
        <div class="d-flex flex-row justify-content-end small exp mx-3">
            <div  class="year fw-bold ">2018-2021</div>
            <div class="d-flex flex-column ">
                <p class="job my-0 fw-bold">
                    Manager
                </p>
                <p class="job-place color-text-classic my-0">
                    Méga compta, Bordeaux
                </p>
                <p class="job-description mt-0 mb-2">
                    Actuellement Chef comptable, et fort de 10 ans d expérience je recherche un cabinet qui pourra m apporter épanouissement
                </p>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-end small exp mt-2 mx-3">
            <div  class="year fw-bold ">2018-2021</div>
            <div class="d-flex flex-column ">
                <p class="job my-0 fw-bold">
                    Manager
                </p>
                <p class="job-place color-text-classic  my-0">
                    Méga compta, Bordeaux
                </p>
                <p class="job-description  mt-0 mb-2">
                    Actuellement Chef comptable, et fort de 10 ans d expérience je recherche un cabinet qui pourra m apporter épanouissement
                </p>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-end small exp mt-2 mx-3">
            <div  class="year fw-bold ">2018-2021</div>
            <div class="d-flex flex-column ">
                <p class="job my-0 fw-bold">
                    Manager
                </p>
                <p class="job-place color-text-classic my-0">
                    Méga compta, Bordeaux
                </p>
                <p class="job-description my-0">
                    Actuellement Chef comptable, et fort de 10 ans d expérience je recherche un cabinet qui pourra m apporter épanouissement
                </p>
            </div>
        </div>
    </div>
    <div id="formation" class="small mt-4 border">
        <h5>Formation</h5>
        <div class="d-flex flex-row justify-content-end small for mx-3">
            <div  class="year fw-bold">1996-1998</div>
            <div class="d-flex flex-column ">
                <p class="graduation my-0 fw-bold">
                    BTS Compta
                </p>
                <p class="establishment color-text-classic my-0">
                    Lycée Choiseul, Tours
                </p>
                <p class="formation-description mt-0 mb-2">
                    Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim,
            </div>
        </div>
    </div>
    <div id="languages" class="small mt-4 border">
        <h5 >Langues</h5>
        <ul>
            <li class="fw-bold square">Anglais Lu, Parlé</li>
            <li class="fw-bold square">Espagnol Lu, Parlé</li>
        </ul>
    </div>
    <div id="hobbies" class="small mt-4 border">
        <h5 >Centre d intérêt </h5>
        <ul>
            <li class="fw-bold square">Voyages</li>
            <li class="fw-bold square">Cuisine</li>
            <li class="fw-bold square">Fourmis</li>
        </ul>
    </div>
</div>');
        $manager->persist($template);

        $template = new Template();
        $template->setName('modern');
        $template->setTheme('copper');
        $template->setHtml('<div id="cv" class="row container  modern" >
        <div class="col-4 color-back" id="aside">
            <div class="photo-container d-flex justify-content-center mt-4">
                <img src="https://thispersondoesnotexist.com/image" alt="" width="80% "class="rounded-circle justify" id="photo">
            </div>
            <div class="text-light text-center mt-4" id="header" >
                Expert Comptable
            </div>
            <div id="personal-details text-light">
                <h5 class="text-light mt-4 text-center">Détails personnels <hr> </h5>
                <p id="name" class="text-light"><i class="fa-solid fa-user"></i>Camille Martin</p>
                <p id="mail" class="text-light"><i class="fa-solid fa-envelope"></i>camille.martin@gmail.com</p>
                <p id="phone" class="text-light"><i class="fa-solid fa-phone"></i>06 54 84 95 95</p>
                <p id="address" class="text-light"><i class="fa-solid fa-house"></i>133 Avenue Thiers 33200 Bordeaux</p>
                <p id="linkedin" class="text-light"><i class="fa-brands fa-linkedin-in"></i>https://www.linkedin.com/feed/</p>
                <p id="github" class="text-light"><i class="fa-brands fa-github"></i>https://www.github.com/feed/</p>
                <i class="fa-solid fa-user"></i>
            </div>
            <div id="languages">
                <h5 class="text-light mt-4 text-center">Langues<hr> </h5>
                <ul>
                    <li class="text-light">Anglais Lu, Parlé</li>
                    <li class="text-light">Espagnol  Lu, Parlé</li>
                </ul>

            </div>
            <div id="hobbies">
                <h5 class="text-light mt-4 text-center">Centre d\'intérêt<hr> </h5>
                <ul>
                    <li class="text-light">Voyages</li>
                    <li class="text-light">Cuisine</li>
                    <li class="text-light">Fourmis</li>
                </ul>

            </div>
        </div>
        <div class="col-8" id="main">
            <div id="profile">
                 <h5 class="mt-4">Profil <hr></h5>
                <p eêtclass="small">
        Actuellement Chef comptable, et fort de 10 ans d\'expérience je recherche un cabinet qui pourra m\'apporter épanouissement
    </p>

            </div>
            <div id="experience" >
                 <h5 class="mt-4">Expérience professionnelle <hr></h5>
                <div class="d-flex flex-row justify-content-end small exp">
                    <div  class="year color-text">2018-2021</div>
                    <div class="d-flex flex-column ">
                        <p class="job my-0">
    Manager
                        </p>
                        <p class="job-place color-text my-0">
    Méga compta, Bordeaux
    </p>
                        <p class="job-description mt-0 mb-2">
    Actuellement Chef comptable, et fort de 10 ans d\'expérience je recherche un cabinet qui pourra m\'apporter épanouissement
    </p>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-end small exp mt-2">
                    <div  class="year color-text">2018-2021</div>
                    <div class="d-flex flex-column ">
                        <p class="job my-0">
    Manager
                        </p>
                        <p class="job-place color-text my-0">
    Méga compta, Bordeaux
    </p>
                        <p class="job-description  mt-0 mb-2">
    Actuellement Chef comptable, et fort de 10 ans d\'expérience je recherche un cabinet qui pourra m\'apporter épanouissement
    </p>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-end small exp mt-2">
                    <div  class="year color-text">2018-2021</div>
                    <div class="d-flex flex-column ">
                        <p class="job my-0">
    Manager
                        </p>
                        <p class="job-place color-text my-0">
    Méga compta, Bordeaux
    </p>
                        <p class="job-description my-0">
    Actuellement Chef comptable, et fort de 10 ans d\'expérience je recherche un cabinet qui pourra m\'apporter épanouissement
    </p>
                    </div>
                </div>
            </div>
            <div id="skills" class="small">
                <h5 class="mt-4">Compétences<hr></h5>

                <ul>
                    <li>PHP</li>
                    <li>JS</li>
                    <li>Bootstrap</li>
                </ul>
            </div>
            <div id="formation" >
                <h5 class="mt-4">Formation <hr></h5>
                <div class="d-flex flex-row justify-content-end small for">
                    <div  class="year color-text">1996-1998</div>
                    <div class="d-flex flex-column ">
                        <p class="graduation my-0">
    BTS Compta
    </p>
                        <p class="establishment color-text my-0">
    Lycée Choiseul, Tours
    </p>
                        <p class="formation-description mt-0 mb-2">
    Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim,
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-end small for mb-5">
                    <div  class="year color-text">1992-1995</div>
                    <div class="d-flex flex-column ">
                        <p class="graduation my-0">
    Terminale S
    </p>
                        <p class="establishment color-text my-0">
    Lycée Descartes, Tours
    </p>
                        <p class="formation-description mt-0 mb-2">
    Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim,
                    </div>
                </div>
            </div>
        </div>
    </div>');
        $manager->persist($template);

        $template = new Template();
        $template->setName('premium');
        $template->setTheme('salmon');
        $template->setHtml('   <div id="cv" class="container premium " >
        <div class="row mx-5" id="title">
            <div class="col col-2 square d-flex flex-column justify-content-end color-back-premium">
                <p class="mb-0 text-white text-center">CV</p>
            </div>
            <div class="col col-8 square d-flex flex-column justify-content-end color-text-premium">
                <h1 class="mb-0 text-center">Camille Martin</h1>
            </div>
        </div>
        <div class="row mx-5 " id="header">
            <div class="col col-2"></div>
            <div class="col col-8 text-center">
                Expert Comptable
            </div>
        </div>
        <div id="personal-details" class="mx-5 small">
            <h5 class="mt-4 ">Détails personnels <hr> </h5>
            <div class="d-flex justify-content-between">
                <div class="color-text-premium d-flex flex-column">
                    <p>Nom</p>
                    <p>Email</p>
                    <p>Numéro de téléphone</p>
                    <p>Adresse</p>
                    <p>LinkedIn</p>
                    <p>Github</p>
                </div>
                <div class="d-flex flex-column">
                    <p>Camille Martin</p>
                    <p>camille.martin@gmail.com</p>
                    <p>06 54 84 95 95</p>
                    <p>133 Avenue Thiers 33200 Bordeaux</p>
                    <p>https://www.linkedin.com/feed/</p>
                    <p>https://www.github.com/feed/</p>
                </div>
                <img src="https://thispersondoesnotexist.com/image" alt="" width="150px" height="150px" id="photo">
            </div>
            <div class="row">
                <div id="profile">
                    <h5 class="mt-4">Profil <hr></h5>
                    <p class="small">
                        Actuellement Chef comptable, et fort de 10 ans d\'expérience je recherche un cabinet qui pourra m\'apporter épanouissement
                    </p>
                <div id="skills" class="small">
                    <h5 class="mt-4">Compétences<hr></h5>
                    <ul>
                        <li class="color-text-premium square">PHP</li>
                        <li class="color-text-premium square">JS</li>
                        <li class="color-text-premium square">Bootstrap</li>
                    </ul>
                </div>
            </div>
                <div id="experience" >
                    <h5 class="mt-4">Expérience professionnelle <hr></h5>
                    <div class="d-flex flex-row justify-content-end small exp">
                        <div  class="year color-text-premium ">2018-2021</div>
                        <div class="d-flex flex-column ">
                            <p class="job my-0">
                                Manager
                            </p>
                            <p class="job-place color-text-premium my-0">
                                Méga compta, Bordeaux
                            </p>
                            <p class="job-description mt-0 mb-2">
                                Actuellement Chef comptable, et fort de 10 ans d\'expérience je recherche un cabinet qui pourra m\'apporter épanouissement
                            </p>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-end small exp mt-2">
                        <div  class="year color-text-premium ">2018-2021</div>
                        <div class="d-flex flex-column ">
                            <p class="job my-0">
                                Manager
                            </p>
                            <p class="job-place color-text-premium  my-0">
                                Méga compta, Bordeaux
                            </p>
                            <p class="job-description  mt-0 mb-2">
                                Actuellement Chef comptable, et fort de 10 ans d\'expérience je recherche un cabinet qui pourra m\'apporter épanouissement
                            </p>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-end small exp mt-2">
                        <div  class="year color-text-premium ">2018-2021</div>
                        <div class="d-flex flex-column ">
                            <p class="job my-0">
                                Manager
                            </p>
                            <p class="job-place color-text-premium my-0">
                                Méga compta, Bordeaux
                            </p>
                            <p class="job-description my-0">
                                Actuellement Chef comptable, et fort de 10 ans d\'expérience je recherche un cabinet qui pourra m\'apporter épanouissement
                            </p>
                        </div>
                    </div>
                </div>
                <div id="formation" >
                    <h5 class="mt-4">Formation <hr></h5>
                    <div class="d-flex flex-row justify-content-end small for">
                        <div  class="year color-text-premium">1996-1998</div>
                        <div class="d-flex flex-column ">
                            <p class="graduation my-0">
                                BTS Compta
                            </p>
                            <p class="establishment color-text-premium my-0">
                                Lycée Choiseul, Tours
                            </p>
                            <p class="formation-description mt-0 mb-2">
                                Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim,
                        </div>
                    </div>
                </div>
                <div id="languages" >
                    <h5 class="mt-4">Langues <hr></h5>
                    <ul>
                        <li class="color-text-premium square">Anglais Lu, Parlé</li>
                        <li class="color-text-premium square">Espagnol Lu, Parlé</li>
                    </ul>
                </div>
                <div id="hobbies" >
                    <h5 class="my-4">Centre d\'intérêt <hr></h5>
                    <ul>
                        <li class="color-text-premium square">Voyages</li>
                        <li class="color-text-premium square">Cuisine</li>
                        <li class="color-text-premium square">Fourmis</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>');
        $manager->persist($template);
        $manager->flush();


    }
}
