import java.io.IOException;
import java.util.ArrayList;
import java.util.StringTokenizer;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.util.EntityUtils;

public class ExtratorDeputado {

	private ArrayList<String> listaLinks = new ArrayList<String>();

	public ArrayList<String> getListaLinks() {
		return listaLinks;
	}

	public void setListaLinks(ArrayList<String> listaLinks) {
		this.listaLinks = listaLinks;
	}

	public void capturarLinks(String url) {

		String conteudo = "";

		DefaultHttpClient client = new DefaultHttpClient();
		HttpGet request = new HttpGet(url);

		HttpResponse response;
		try {
			response = client.execute(request);
			HttpEntity entity = response.getEntity();

			conteudo = EntityUtils.toString(entity);
			
			salvarLinks(conteudo);

		} catch (ClientProtocolException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
	private void salvarLinks(String conteudo){

		StringTokenizer st = new StringTokenizer(conteudo,"<>");
		String atual;

		while(st.hasMoreTokens()){
			atual = st.nextToken();

			if(atual.contains("a href='/parlamentar/")){
				
				atual = atual.replace("'", "");
				atual = atual.replace("a href=", "http://www.alepe.pe.gov.br");
				atual = atual.replace(" title=\"\"","");
				listaLinks.add(atual);	

			}
		}

	}

}
