
public class App {
	
	public static void main(String[] args) {
		
		ExtratorDeputado ed = new ExtratorDeputado();
		//ed.capturarLinks("http://www.alepe.pe.gov.br/parlamentares/");
		ed.extrairDadosCandidato("http://www.alepe.pe.gov.br/parlamentar/aglailson-junior/");
		
		/*
		
		for (String link : ed.getListaLinks()) {
			System.out.println(link);
		}
		*/		
		/*ExtratorProposicoes ep = new ExtratorProposicoes();
	    ep.capturarLinks("http://www.alepe.pe.gov.br/proposicoes/", "Qualquer tipo", "Adalto Santos", "Por Autor", 1);
	    
	    for (String link : ep.getListaLinksProp()) {
			System.out.println(link);
		}
	    
	    System.out.println(ep.getListaLinksProp().size());*/
	}

}
