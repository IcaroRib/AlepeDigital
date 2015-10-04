
public class App {
	
	public static void main(String[] args) {
		
		/*ExtratorDeputado ed = new ExtratorDeputado();
		ed.capturarLinks("http://www.alepe.pe.gov.br/parlamentares/");
		
		for (String link : ed.getListaLinks()) {
			System.out.println(link);
		}
		*/		
		ExtratorProposicoes ep = new ExtratorProposicoes();
	    ep.capturarLinks("http://www.alepe.pe.gov.br/proposicoes/", "Krause");
	    
	    for (String link : ep.getListaLinksProp()) {
			System.out.println(link);
		}
	}

}
