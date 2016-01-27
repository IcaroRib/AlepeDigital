import java.sql.SQLException;
import java.util.ArrayList;
import java.util.StringTokenizer;


public class App {
	
	public static void main(String[] args) {
		
		/*ExtratorDeputado ed = new ExtratorDeputado();
		ed.capturarLinks("http://www.alepe.pe.gov.br/parlamentares/");
		for (String url : ed.getListaLinks()) {
			System.out.println("Extraindo deputados URL = " + url);
			Deputado deputado = ed.extrairDadosCandidato(url);
			//break;
		}*/
		
		DBDeputado db = new DBDeputado();
		ArrayList<Deputado> listaDeputados = null;
		try {
			listaDeputados = db.recuperarDeputados();
		} catch (ClassNotFoundException | SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}		
		for (Deputado deputado : listaDeputados) {
			ExtratorProposicoes ep = new ExtratorProposicoes();
			Proposicao prop = new Proposicao();
			System.out.println("Extraindo proposicoes candidato = " + deputado.getNomePolitico());
			ep.capturarLinks("http://www.alepe.pe.gov.br/proposicoes/", "Projetos", deputado.getNomePolitico(), "Por Autor", 1);
			for (String url : ep.getListaLinksProp()) {
				System.out.println("Extraindo proposicoes URL = " + url);
				ep.ExtrairDadosProp(url, deputado.getIdDeputado());
			}
			deputado.setProposicoes(ep.getListaProposicoes());
		}
		
		System.out.println("Fim");
	}
	

}
