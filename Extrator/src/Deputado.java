import java.util.ArrayList;


public class Deputado {
	
	private String nomePolitico;
	private String nomeCivil;
	private String partido;
	private String descri��o;
	private String naturalidade;
	private String email;
	private String anivers�rio; 
	private String profiss�o;
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
	public String getDescri��o() {
		return descri��o;
	}
	public void setDescri��o(String descri��o) {
		this.descri��o = descri��o;
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
	public String getAnivers�rio() {
		return anivers�rio;
	}
	public void setAnivers�rio(String anivers�rio) {
		this.anivers�rio = anivers�rio;
	}
	public String getProfiss�o() {
		return profiss�o;
	}
	public void setProfiss�o(String profiss�o) {
		this.profiss�o = profiss�o;
	}
	public String getTelefone() {
		return telefone;
	}
	public void setTelefone(String telefone) {
		this.telefone = telefone;
	}
	
	

}
