package alepe.to;
import java.util.ArrayList;


public class Deputado {
	
	private String nomePolitico;
	private String nomeCivil;
	private String partido;
	private String descricao;
	private String naturalidade;
	private String email;
	private String aniversario; 
	private String profissao;
	private String telefone;
	private int idDeputado;
	private ArrayList<Proposicao> proposicoes= new ArrayList<Proposicao>();
	
	
	
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
	public String getDescricao() {
		return descricao;
	}
	public void setDescricao(String descricao) {
		this.descricao = descricao;
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
	public String getAniversario() {
		return aniversario;
	}
	public void setAniversario(String aniversario) {
		this.aniversario = aniversario;
	}
	public String getProfissao() {
		return profissao;
	}
	public void setProfissao(String profissao) {
		this.profissao = profissao;
	}
	public String getTelefone() {
		return telefone;
	}
	public void setTelefone(String telefone) {
		this.telefone = telefone;
	}
	public int getIdDeputado() {
		return idDeputado;
	}
	public void setIdDeputado(int idDeputado) {
		this.idDeputado = idDeputado;
	}
	
	

}
