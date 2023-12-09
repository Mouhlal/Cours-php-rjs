
import { Link, Route, Routes } from "react-router-dom"
import AfficherSalaries from "./controle_salarie/AfficherSalaries"
import UpdateSalarie from "./controle_salarie/UpdateSalarie"
import AjouterSalarie from "./controle_salarie/AjouterSalarie"
import SearchSalarie from "./controle_salarie/SearchSalarie"


const Aapp = () => {
   

    return (

        <Routes>
            <Route path="/" element={<AfficherSalaries />} />
            <Route path="/:matricule/modifier" element={<UpdateSalarie />} />
            <Route path="/ajouter" element={<AjouterSalarie />} />
            <Route path="/rechercher" element={<SearchSalarie />} />
        </Routes>

            )

}


export default Aapp
