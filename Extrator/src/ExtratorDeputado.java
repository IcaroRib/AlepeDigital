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
	private ArrayList<Deputado> listaDeputados = new ArrayList<Deputado>();
	
	public ArrayList<Deputado> getListaDeputados() {
		return listaDeputados;
	}

	public void setListaDeputados(ArrayList<Deputado> listaDeputados) {
		this.listaDeputados = listaDeputados;
	}

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
				atual = atual.replace(" class=\"parlamentares-list-a\"","");
				listaLinks.add(atual);	

			}
		}

	}
	
	public void extrairDadosCandidato(String url){
		
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
		Deputado deputado = new Deputado();
		
		String atual;
		while(st.hasMoreTokens()){
			atual = st.nextToken();
			
			if(atual.contains("h1 class=\"title\"")){
				deputado.setNomePolitico(st.nextToken());			
			}
			
			else if(atual.contains("span class=\"subtitle\"")){
				deputado.setPartido(st.nextToken());
			}
			
			else if(atual.contains("div class=\"resume\"")){
				st.nextToken();
				st.nextToken();
				deputado.setDescrição(st.nextToken());
			}
			
			else if(atual.contains("Naturalidade")){
				st.nextToken();
				st.nextToken();
				st.nextToken();
				deputado.setNaturalidade(st.nextToken());
			}
						
			else if(atual.contains("Nome civil:")){
				st.nextToken();
				st.nextToken();
				st.nextToken();
				deputado.setNomeCivil(st.nextToken());			
			}
			
			else if(atual.contains("E-mail:")){
				st.nextToken();
				st.nextToken();
				st.nextToken();
				deputado.setEmail(st.nextToken());					
			}
			
			else if(atual.contains("Aniversário")){
				st.nextToken();
				st.nextToken();
				st.nextToken();
				deputado.setAniversário(st.nextToken());			
			}
			
			else if(atual.contains("Profissão")){
				st.nextToken();
				st.nextToken();
				st.nextToken();
				deputado.setProfissão(st.nextToken());			
			}
			
			else if(atual.contains("Telefone")){
				st.nextToken();
				st.nextToken();
				st.nextToken();
				deputado.setTelefone(st.nextToken());
			}
		}
		
		listaDeputados.add(deputado);
		
	}
	
	

}
