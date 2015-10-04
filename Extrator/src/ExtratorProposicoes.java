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
	
	public void capturarLinks(String url, String autor) {

		String conteudo = "";
		DefaultHttpClient client = new DefaultHttpClient();
		HttpGet request = new HttpGet(url);

		HttpResponse response;
		try {
			response = client.execute(request);
			HttpEntity entity = response.getEntity();
			conteudo = EntityUtils.toString(entity);
			
			salvarLinks(conteudo, autor);

		} catch (ClientProtocolException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}	
	
	private void salvarLinks(String conteudo, String autor){

		StringTokenizer st = new StringTokenizer(conteudo,"<>");
		String atual;

		while(st.hasMoreTokens()){
			atual = st.nextToken();
			
			if(atual.equals("tr")){
				//System.out.println("Aqui");
				while(st.hasMoreTokens()){
					atual = st.nextToken();			
					if(atual.contains(autor)){
						while(st.hasMoreTokens()){
							atual = st.nextToken();
							if(atual.contains("a href=/proposicao-texto-completo/")){
								atual = atual.replace("'", "");
								atual = atual.replace("a href=", "http://www.alepe.pe.gov.br");
								String link = "";
								for (char c : atual.toCharArray()) {
									
									if (c == '&'){
										break;
									}
									link += c;
									
								}
								//atual = atual.replace(" title=\"\"","");
								listaLinksProp.add(link);		
							}
							
							else if (atual.contains("tr")){
								break;
							}
						}
						
						break;
					}
				}
			}
		}

	}
	

}
