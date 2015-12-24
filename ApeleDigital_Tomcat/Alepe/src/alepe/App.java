package alepe;

import java.sql.SQLException;
import java.util.StringTokenizer;
import alepe.to.ExtratorProposicoes;


public class App {
	
	public static void main(String[] args) {
		ExtratorProposicoes ep = new ExtratorProposicoes();
		ep.ExtrairDadosProp("http://www.alepe.pe.gov.br/proposicao-texto-completo/?docid=ACB298FD41F0D52803257EAE0045EA4E", 1);
		
		/*ExtratorProposicoes ep = new ExtratorProposicoes();
		ep.ExtrairDadosProp("http://www.alepe.pe.gov.br/proposicao-texto-completo/?docid=1429578384ABE08E03257ECF0061DB1D");	
		
		ExtratorDeputado ed = new ExtratorDeputado();
		ed.capturarLinks("http://www.alepe.pe.gov.br/parlamentares/");
		for (String url : ed.getListaLinks()) {
			System.out.println("Extraindo deputados URL = " + url);
			Deputado deputado = ed.extrairDadosCandidato(url);
			break;
		}
		
		for (Deputado deputado : ed.getListaDeputados()) {
			ExtratorProposicoes ep = new ExtratorProposicoes();
			Proposicao prop = new Proposicao();
			ep.capturarLinks("http://www.alepe.pe.gov.br/proposicoes/", "Qualquer tipo", deputado.getNomePolitico(), "Por Autor", 1);
			for (String url : ep.getListaLinksProp()) {
				ep.ExtrairDadosProp(url, deputado.getIdDeputado());
				break;
			}
			deputado.setProposicoes(ep.getListaProposicoes());
		}
		System.out.println("Fim");*/
	}
	

}
