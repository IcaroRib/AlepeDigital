import java.util.ArrayList;


public class Deputado {
	
	private String nomePolitico;
	private String nomeCivil;
	private String partido;
	private String descrição;
	private String naturalidade;
	private String email;
	private String aniversário; 
	private String profissão;
	private String telefone;
	private ArrayList<Proposicao> proposicoes = new ArrayList<Proposicao>();
	
	
	
	public ArrayList<Proposicao> getProposicoes() {
		return proposicoes;
	}
	public void setProposicoes(ArrayList<Proposicao> proposicoes) {
		this.proposicoes = proposicoes;
	}
	public String getNomePolitico() {
		return nomePolitico;
	}
	public void setNomePolitico(String nomePolitico) {
		this.nomePolitico = nomePolitico;
	}
	public String getNomeCivil() {
		return nomeCivil;
	}
	public void setNomeCivil(String nomeCivil) {
		this.nomeCivil = nomeCivil;
	}
	public String getPartido() {
		return partido;
	}
	public void setPartido(String partido) {
		this.partido = partido;
	}
	public String getDescrição() {
		return descrição;
	}
	public void setDescrição(String descrição) {
		this.descrição = descrição;
	}
	public String getNaturalidade() {
		return naturalidade;
	}
	public void setNaturalidade(String naturalidade) {
		this.naturalidade = naturalidade;
	}
	public String getEmail() {
		return email;
	}
	public void setEmail(String email) {
		this.email = email;
	}
	public String getAniversário() {
		return aniversário;
	}
	public void setAniversário(String aniversário) {
		this.aniversário = aniversário;
	}
	public String getProfissão() {
		return profissão;
	}
	public void setProfissão(String profissão) {
		this.profissão = profissão;
	}
	public String getTelefone() {
		return telefone;
	}
	public void setTelefone(String telefone) {
		this.telefone = telefone;
	}
	
	

}
