import java.io.IOException;
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


public class ExtratorProposicoes {
	
	private ArrayList<String> listaLinksProp = new ArrayList<String>();
	
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
				for (int i = 2; i < numPaginas + 1; i++) {
					this.capturarLinks(url, tipoProp, autor, tipoPes, i);
				}
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
	

}
