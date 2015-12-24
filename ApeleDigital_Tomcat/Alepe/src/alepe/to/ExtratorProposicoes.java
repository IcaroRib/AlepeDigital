package alepe.to;
import java.io.IOException;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.StringTokenizer;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.util.EntityUtils;

import alepe.dao.DBProposicoes;


public class ExtratorProposicoes {
	
	private ArrayList<String> listaLinksProp = new ArrayList<String>();
	private ArrayList<Proposicao> listaProposicoes = new ArrayList<Proposicao>();	
	private String[] tagsFixas = {"Result. 1� Disc.:","Result. 2� Disc.:","Resultado Final:"};
	
	public ArrayList<Proposicao> getListaProposicoes() {
		return listaProposicoes;
	}

	public void setListaProposicoes(ArrayList<Proposicao> listaProposicoes) {
		this.listaProposicoes = listaProposicoes;
	}

	public ArrayList<String> getListaLinksProp() {
		return listaLinksProp;
	}

	public void setListaLinksProp(ArrayList<String> listaLinksProp) {
		this.listaLinksProp = listaLinksProp;
	}
	
	public void capturarLinks(String url, String tipoProp, String autor, String tipoPes, int numPagina) {

		String conteudo = "";
		DefaultHttpClient client = new DefaultHttpClient();
		HttpPost httpPost = new HttpPost("http://www.alepe.pe.gov.br/proposicoes/");
		List <NameValuePair> nvps = new ArrayList <NameValuePair>();
		nvps.add(new BasicNameValuePair("field-tipo-filtro", tipoProp));
		nvps.add(new BasicNameValuePair("field-proposicoes-filtro", tipoPes));
		nvps.add(new BasicNameValuePair("field-proposicoes", autor));
		nvps.add(new BasicNameValuePair("pagina", Integer.toString(numPagina)));

		try {
			httpPost.setEntity(new UrlEncodedFormEntity(nvps));
			HttpResponse response = client.execute(httpPost);
			HttpEntity entity = response.getEntity();
			conteudo = EntityUtils.toString(entity);
			//System.out.println(conteudo);			
			
			if(numPagina == 1){
				int numPaginas = salvarLinks(conteudo, autor, true);
				/*for (int i = 2; i < numPaginas + 1; i++) {
					this.capturarLinks(url, tipoProp, autor, tipoPes, i);
				}*/
			}
			else{
				salvarLinks(conteudo, autor, false);
			}

		} catch (ClientProtocolException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}	
	
	private int salvarLinks(String conteudo, String autor, boolean primeiraConsulta){
		
		int numPaginas = 0;
		StringTokenizer st = new StringTokenizer(conteudo,"<>");
		String atual;
		while(st.hasMoreTokens()){
			atual = st.nextToken();		
			if(atual.contains("Exibindo") && primeiraConsulta == true){
				st.nextToken();
				st.nextToken();
				st.nextToken();
				st.nextToken();
				st.nextToken();
				atual = st.nextToken();
				numPaginas = (Integer.parseInt(atual) / 25) + 1;
				System.out.println(numPaginas);
			}
			
			else if(atual.contains("a href=/proposicao-texto-completo/")){
				atual = atual.replace("'", "");
				atual = atual.replace("a href=", "http://www.alepe.pe.gov.br");
				String url = "";
				for (char c : atual.toCharArray()) {									
					if (c == '&'){
						break;
					}
					url += c;
										
				}
				listaLinksProp.add(url);
				st.nextToken();
				st.nextToken();
				st.nextToken();
				st.nextToken();
				st.nextToken();
				st.nextToken();
				st.nextToken();
			}
		}
		return numPaginas;
	}
	
	public void ExtrairDadosProp(String url, int idAutor){		
		System.out.println(url);
		String conteudo = "";
		DefaultHttpClient client = new DefaultHttpClient();
		HttpGet request = new HttpGet(url);
		
		HttpResponse response;
		try {
			response = client.execute(request);
			HttpEntity entity = response.getEntity();			

			conteudo = EntityUtils.toString(entity);
			
		} catch (ClientProtocolException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		StringTokenizer st = new StringTokenizer(conteudo, "<>");		
		Proposicao prop = new Proposicao();
		String atual;
		String texto = "";
		String justificativa = "";
		boolean textoCompleto = true;
		while(st.hasMoreTokens()){
			atual = st.nextToken();	
			//System.out.println(atual);
			if(atual.contains("td-bold")){
				atual = st.nextToken();
				if(atual.contains("Situa��o do Tr�mite")){
					st.nextToken();
					st.nextToken();
					st.nextToken();
					prop.setSituacaoTramite(st.nextToken());
					System.out.println("Situa��o: " + prop.getSituacaoTramite());
				}
				
				else if(atual.contains("Localiza��o")){
					st.nextToken();
					st.nextToken();
					st.nextToken();
					String localizacao = st.nextToken();
					prop.setLocalizacao(localizacao);
					System.out.println("Localiza��o: " + prop.getLocalizacao());
				}
				
				else if(atual.contains("Publica��o")){
					st.nextToken();
					st.nextToken();
					st.nextToken();
					String dataPub = st.nextToken();
					prop.setDataPublicacao(dataPub);
					System.out.println("Data Publicacao: " + prop.getDataPublicacao());
				}
			}	
			
			else if(atual.contains("h2 class")){
				String tipoProp = st.nextToken();
				if (tipoProp.contains("Proposi")){
					continue;
					
				}else{
					tipoProp = tipoProp.substring(0, tipoProp.length()-1);
					prop.setTipoProp(tipoProp);
					System.out.println("Tipo da proposi��o: " + prop.getTipoProp());
					
					st.nextToken();
					st.nextToken();
					st.nextToken();
					
					prop.setNumero(st.nextToken());
					
					st.nextToken();
					st.nextToken();
					st.nextToken();
					String descCurta = st.nextToken();
					prop.setDescricaoCurta(descCurta);
					
				}
			}
			
			if (atual.contains("h3 class")){
				atual = st.nextToken();
				if(atual.contains("Texto Completo")){
					st.nextToken();
					st.nextToken();
					st.nextToken();
					st.nextToken();
					st.nextToken();
					while(st.hasMoreTokens()){			
						String proximo = st.nextToken();
						if (proximo.contains("/div")){
							break;
						}
						else if(proximo.contains("br /")){
							continue;
						}
						else{
							texto += proximo;
						}
					}
					
				}
				
				else if(atual.contains("Justificativa")){
					st.nextToken();
					st.nextToken();
					st.nextToken();
					st.nextToken();
					st.nextToken();
					while(st.hasMoreTokens()){			
						String proximo = st.nextToken();
						if (proximo.contains("/div")){
							break;
						}
						else if(proximo.contains("br /")){
							continue;
						}
						else{
							justificativa += proximo.replace("   ","");
						}
					}
					
				}
			}
			
			/*if(atual.contains("Justificativa")){
				textoCompleto = false;
			}
			
			else if(st.hasMoreTokens()){
				String proximo = st.nextToken();
				if(proximo.contains("br /") && textoCompleto == true){
					texto +=atual.replace("br /", "");
				}
				
				else if(proximo.contains("br /") && textoCompleto == false){
					justificativa +=atual.replace("br /", "");
				}
			}*/

			for (String tag : tagsFixas) {
				
				if (atual.contains(tag)){
					String resultado, data;
					st.nextToken();
					st.nextToken();		
					st.nextToken();
					resultado = st.nextToken();
					
					if(resultado.equals("/td")){
						resultado = "";
					}
					else{
						st.nextToken();
					}
					st.nextToken();
					st.nextToken();
					st.nextToken();
					st.nextToken();
					st.nextToken();
					st.nextToken();
					data = st.nextToken();
					prop.getResultadoDiscussoes().put(data, resultado);
				}
			}				
			
		}
		prop.setDescricaoCompleta(texto);
		prop.setJustificativa(justificativa);
		prop.setIdAutor(idAutor);
		this.listaProposicoes.add(prop);
		DBProposicoes db = new DBProposicoes();
		try {
			db.inserirProposicao(prop);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}
	

}
