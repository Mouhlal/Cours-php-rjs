import { useDispatch, useSelector } from "react-redux"
import { selectAllSalaries } from "./salarie_reducer"
import { Link } from "react-router-dom"

const AfficherSalaries = () => {

    const salaries = useSelector(selectAllSalaries)
    const dispatch = useDispatch()

    function Delete (matricule) {
        const deleteS = {
            type: "SUPPRIMER",
            payload: matricule
        }
        dispatch(deleteS)
    }

    return (
        <div>
            <Link to={"/ajouter"}>Ajouter salarie</Link>
            <Link to={"/rechercher"}>Rechercher salarie</Link><br /><br /><br />
            <table border={2}>
                <tr>
                    <th>Matricule</th>
                    <th>Nom complet</th>
                    <th>Service</th>
                    <th>Salaire</th>
                    <th>Date Affectation</th>
                    <th>Ancienneté</th>
                    <th colSpan={2}>Action</th>
                </tr>
                {salaries.map(salarie => 
                    <tr>
                        
                        <td>{salarie.matricule}</td>
                        <td>{salarie.nom}</td>
                        <td>{salarie.service}</td>
                        <td>{salarie.salaire}</td>
                        <td>{salarie.dateAffectation}</td>
                        <td>{new Date().getFullYear() - salarie.dateAffectation.split("/")[2]} ans</td>
                        <td colSpan={2}><Link to={`/${salarie.matricule}/modifier`}>Modifier</Link> | <button onClick={() => Delete(salarie.matricule)} >Supprimer</button></td>
                    </tr>
                )}
            </table>
        </div>
    )
}


export default AfficherSalaries